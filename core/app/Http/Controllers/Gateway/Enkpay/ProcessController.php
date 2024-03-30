<?php

namespace App\Http\Controllers\Gateway\Enkpay;

use App\Models\User;
use App\Models\Deposit;
use App\Constants\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Gateway\PaymentController;


class ProcessController extends Controller
{


    public static function process($deposit)
    {

        $enkpayAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $key = env('WEBKEY');
        $email = Auth::user()->email;
        $amount = round($deposit->final_amo, 2);
        $url = "https://web.enkpay.com/pay?amount=$amount&key=$key&ref=$deposit->trx&email=$email";
        $send['url'] =  $url;


        $alias = $deposit->gateway->alias;

        $send['view'] = 'user.payment.'.$alias;

        return json_encode($send);
    }

    public function ipn(request $request)
    {

        $ip = $request->ip();
        $deposit = Deposit::where('trx', $request->trans_id)->orderBy('id', 'DESC')->first();


        if ($request->status == 'failed') {

            Deposit::where('trx', $request->trans_id)->update(['status' => 3]);
            $message = "Ace Logs |".  Auth::user()->email . "| canceled funding |";
            send_notification($message);
            $message = 'Transaction failed, Ref: ' . $request->trans_id;
            $notify[] = ['error', $message];
            return to_route(gatewayRedirectUrl())->withNotify($notify);
        }



        if (!isset($request->trans_id)) {
            $message = 'Unable to process';
            $notify[] = ['error', $message];
            return to_route(gatewayRedirectUrl())->withNotify($notify);
        }

        $trxstatus = Deposit::where('trx', $request->trans_id)->first()->status ?? null;
        if ($trxstatus == 1) {

            $message = "Ace Logs |".  Auth::user()->email . "| is trying to fund  with | $request->trans_id  | " . number_format($request->amount, 2) . "\n\n IP ====> " . $request->ip();
            send_notification($message);
            $message = 'Transaction already confirmed or not found';
            $notify[] = ['error', $message];
            return to_route(gatewayRedirectUrl())->withNotify($notify);
        }


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://web.enkpay.com/api/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('trans_id' => "$request->trans_id"),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        $status1 = $var->detail ?? null;
        $amount = $var->price ?? null;

        if ($status1 == "success" && $deposit->final_amo == $amount && $deposit->status == Status::PAYMENT_INITIATE) {
            User::where('id', Auth::id())->increment('balance', $amount);
            Deposit::where('trx', $request->trans_id)->update(['status' => 1]);

            $message =  "Ace Logs |". Auth::user()->email . "| funding successful |" . number_format($amount, 2) . "\n\n IP ====> $ip" . "\n\n OrderID ====> $request->trans_id";
            send_notification($message);
            send_notification_2($message);


            //PaymentController::userDataUpdate($deposit);

            $notify = "Transaction Successful";
            return redirect('/user/deposit/new')->with('message', $notify);
        }

        $message = 'Unable to process';
        $notify[] = ['error', $message];
        $notifyApi[] = $message;

        if ($deposit->from_api) {
            return response()->json([
                'code'=>200,
                'status'=>'ok',
                'message'=>['error'=>$notifyApi]
            ]);
        }


        return to_route(gatewayRedirectUrl())->withNotify($notify);
    }










}
