<?php

namespace App\Http\Controllers\User;

use App\Models\Gateway;
use App\Models\ProductDetail;
use App\Models\User;
use App\Models\Order;
use App\Models\Deposit;
use App\Constants\Status;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\GatewayCurrency;
use Illuminate\Support\Facades\Storage;
use Stripe\Issuing\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $telegramToken;

    public function __construct()
    {
        $this->telegramToken = env('TELEGRAM_BOT_TOKEN');
    }

    public function home()
    {
        $pageTitle = 'Dashboard';
        $user = auth()->user();

        $widget['total_payments'] = Deposit::where('user_id', $user->id)->successful()->sum('amount');
        $widget['total_orders'] = Order::where('user_id', $user->id)->paid()->count();
        $widget['total_tickets'] = SupportTicket::where('user_id', $user->id)->count();

        //$latestDeposits = $user->deposits()->take(5)->get();

        $latestDeposits = Deposit::latest()->where('user_id', Auth::id())->with('gateway', 'order')->orderBy('id', 'desc')->take(10)->get();


        return view('templates.basic.user.dashboard', compact('pageTitle', 'user', 'widget', 'latestDeposits'));
    }


    public function resloveDeposit(Request $request)
    {
        $pageTitle = 'Reslove Deposit';
        $dep = Deposit::where('trx', $request->trx)->first() ?? null;

        if ($dep->status == 1) {
            $notify[] = ['error', "This Transaction has been successful"];
            return back()->withNotify($notify);
        }


        if ($dep == null) {
            $notify[] = ['error', "Transaction has been deleted"];
            return back()->withNotify($notify);
        } else {

            $trx = $request->trx;
            return view($this->activeTemplate . 'user.resolve_deposit', compact('pageTitle', 'trx'));
        }
    }


    public function  resolve_now(request $request)
    {


        $trx = Deposit::where('trx', $request->trx_ref)->first()->status ?? null;

        $ck_trx = (int)$trx;

        if ($ck_trx == 1) {

            $email = Auth::user()->email;
            $message =  "$email |ACE LOGS | is trying to fund and a successful order with orderid $request->trx_ref";
            send_notification_2($message);
            send_notification_3($message);


            $message =  "$email | ACE LOGS | is trying to fund and a successful order with orderid $request->trx_ref";
            send_notification($message);

            $notify[] = ['error', "This Transaction has been successful"];
            return back()->withNotify($notify);
        }



        if ($ck_trx != 0) {

            $email = Auth::user()->email;
            $message =  "$email |ACE LOGS | is trying to fund and a successful order with orderid $request->trx_ref";
            send_notification_2($message);
            send_notification_3($message);


            $message =  "$email | ACE LOGS | is trying to fund and a successful order with orderid $request->trx_ref";
            send_notification($message);

            $notify[] = ['error', "This Transaction has been successful"];
            return back()->withNotify($notify);
        }

        if ($ck_trx == 2) {

            $email = Auth::user()->email;
            $message =  "$email |ACE LOGS | is trying to fund and a successful order with orderid $request->trx_ref";
            send_notification_2($message);
            send_notification_3($message);


            $message =  "$email | ACE LOGS | is trying to fund and a successful order with orderid $request->trx_ref";
            send_notification($message);

            $notify[] = ['error', "This Transaction has been successful"];
            return back()->withNotify($notify);
        }




        if ($ck_trx == 0) {
            $session_id = $request->session_id;
            if ($session_id == null) {
                $notify[] = ['error', "session id or amount cant be empty"];
                return back()->withNotify($notify);
            }


            $curl = curl_init();
            $databody = array(
                'session_id' => "$session_id",
                'ref' => "$request->trx_ref"

            );

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://web.sprintpay.online/api/resolve',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $databody,
            ));

            $var = curl_exec($curl);
            curl_close($curl);
            $var = json_decode($var);

            $message = $var->message ?? null;
            $status = $var->status ?? null;
            $trx = $var->trx ?? null;
            $amount = $var->amount ?? null;

            if ($status == true) {
                User::where('id', Auth::id())->increment('balance', $var->amount);
                Deposit::where('trx', $request->trx_ref)->update(['status' => 1]);


                $user_email = Auth::user()->email;
                $message = "$user_email | $request->trx_ref | $session_id | $var->amount | just resolved deposit | ACE LOGSs";
                send_notification($message);
                send_notification_2($message);
                send_notification_3($message);


                $notify[] = ['success', "Transaction successfully Resolved, NGN $amount added to ur wallet"];
                return redirect('user/dashboard')->withNotify($notify);
            }

            if ($status == false) {

                $notify[] = ['error', "$message"];
                return redirect('user/dashboard')->withNotify($notify);
            }


            $notify[] = ['error', "please try again later"];
            return back()->withNotify($notify);
        }
    }



    public function depositHistory(Request $request)
    {
        $pageTitle = 'Payment History';
        $deposits = auth()->user()->deposits()->searchable(['trx'])->with('gateway', 'order')->orderBy('id', 'desc')->paginate(getPaginate());
        return view('templates.basic.user.deposit_history', compact('pageTitle', 'deposits'));
    }


    public function depositNew(Request $request)
    {
        $pageTitle = 'Fund Wallet';
        $gateway_currency = Gateway::where('status', 1)->get();
        $deposits = Deposit::latest()->where('user_id', Auth::id())->with('gateway', 'order')->paginate('5');
        return view('templates.basic.user.deposit_new', compact('pageTitle', 'gateway_currency', 'deposits'));
    }

    public function attachmentDownload($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name) . '- attachments.' . $extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function userData()
    {
        $user = auth()->user();
        if ($user->profile_complete == 1) {
            return to_route('user.products');
        }
        $pageTitle = 'User Data';
        $info       = json_decode(json_encode(getIpInfo()), true);
        $mobileCode = @implode(',', $info['code']);
        $countries  = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        return view($this->activeTemplate . 'user.user_data', compact('pageTitle', 'user', 'mobileCode', 'countries'));
    }

    public function rules(Request $request)
    {

        return view('templates.basic.user.rules');

    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();
        if ($user->profile_complete == 1) {
            return to_route('user.products');
        }

        $validationRule = [
            'firstname' => 'required',
            'lastname' => 'required',
        ];

        if ($user->login_by) {
            if (!$user->email) {
                $validationRule = array_merge($validationRule, [
                    'email' => 'required|string|email|unique:users',
                ]);
            }
            $countryData = (array)json_decode(file_get_contents(resource_path('views/partials/country.json')));
            $countryCodes = implode(',', array_keys($countryData));
            $mobileCodes = implode(',', array_column($countryData, 'dial_code'));
            $countries = implode(',', array_column($countryData, 'country'));
            $validationRule = array_merge($validationRule, [
                'mobile' => 'required|regex:/^([0-9]*)$/',
                'mobile_code' => 'required|in:' . $mobileCodes,
                'country_code' => 'required|in:' . $countryCodes,
                'country' => 'required|in:' . $countries,
            ]);
        }

        $request->validate($validationRule);
        $hasEmail = $user->email ? true : false;
        $general = gs();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = [
            'country' => $user->login_by ? $request->country : @$user->address->country,
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'city' => $request->city,
        ];
        $user->country_code = $request->country_code;
        $user->mobile = $request->mobile_code . $request->mobile;
        $user->profile_complete = 1;
        if (!$hasEmail) {
            $user->ev = $general->ev ? Status::NO : Status::YES;
            $user->email = $request->email;
        }
        $user->sv = $general->sv ? Status::NO : Status::YES;
        $user->save();

        $notify[] = ['success', 'Registration process completed successfully'];
        return to_route('user.products')->withNotify($notify);
    }

    public function orders()
    {
        $pageTitle = 'Orders';

        $orders = Order::where('user_id', auth()->id())
            ->where('status', Status::ORDER_PAID)
            ->searchable(['deposit:trx'])
            ->orderBy('id', 'desc')
            ->with('deposit', 'orderItems')
            ->paginate(getPaginate());


        $count_order = Order::where('user_id', Auth::id())->where('status', 1)->count();
        $order_sum = Order::where('user_id', Auth::id())->where('status', 1)->sum('total_amount');


        return view(  'templates.basic.user.orders', compact('pageTitle', 'orders', 'count_order', 'order_sum'));
    }

    public function orderDetails($id)
    {
        $pageTitle = 'Order Details';
        $order = Order::where('user_id', auth()->id())->where('status', Status::ORDER_PAID)->findOrFail($id);
        $orderItems = OrderItem::whereIn('id', $order->orderItems->pluck('id') ?? [])->with('product', 'productDetail')->paginate(getPaginate());
        $orderd = OrderItem::whereIn('id', $order->orderItems->pluck('id') ?? [])->with('productDetail')->get();

        foreach ($orderd as $product)
        {
            $item[] = $product->productDetail->id;
        }

        $update = ProductDetail::whereIn('id', $item)->update(['is_sold'=>Status::YES]);

        $get_id = $id;

        return view('templates.basic.user.order_details', compact('pageTitle', 'order', 'orderItems', 'get_id'));
    }



    public function copy($id)
    {

        $order = Order::where('user_id', auth()->id())->where('status', Status::ORDER_PAID)->findOrFail($id);
        $copyall = OrderItem::whereIn('id', $order->orderItems->pluck('id') ?? [])->with('product', 'productDetail')->get();

        $result = [];
        foreach ($copyall as $data){
            $result[] = $data->productDetail->details;
        }

        $text = implode(PHP_EOL, $result);
        Storage::put('result.txt', $text);
        $filePath = storage_path('app/result.txt');
        return response()->download($filePath, 'result.txt');



    }


    public function e_check(request $request){

        $get_user =  User::where('email', $request->email)->first() ?? null;

        if($get_user == null){

            return response()->json([
                'username' => "Not Found, Pleas try again"
            ]);

        }

        return response()->json([
            'username' => $get_user->username
        ]);

    }

    protected function sendMessage($chatId, $text, $keyboard = null)
    {
        $data = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ];

        if ($keyboard) {
            $data['reply_markup'] = json_encode($keyboard);
        }

        file_get_contents("https://api.telegram.org/bot" . $this->telegramToken . "/sendMessage?" . http_build_query($data));
    }

    public function e_fund(request $request){

        $get_user =  User::where('email', $request->email)->first() ?? null;

        if($get_user == null){

            return response()->json([
                'status' => false,
                'message' => 'No user found, please check email and try again',
            ]);
        }

        User::where('email', $request->email)->increment('balance', $request->amount) ?? null;

        $amount = number_format($request->amount, 2);

        $get_depo = Deposit::where('trx', $request->order_id)->first() ?? null;
        if ($get_depo == null){
            $trx = new Deposit();
            $trx->trx = $request->order_id;
            $trx->status = 1;
            $trx->user_id = $get_user->id;
            $trx->amount = $request->amount;
            $trx->method_code = 250;
            $trx->save();
        }else{
            Deposit::where('trx', $request->order_id)->update(['status'=> 1]);
        }

       $tid =  User::where('email', $request->email)->first()->telegram_id ?? null;

        if($tid != null){
            $chatId =  User::where('email', $request->email)->first()->telegram_id;
            $this->sendMessage($chatId, "Your Account has been funded with | ₦".$request->amount);

        }


        return response()->json([
            'status' => true,
            'message' => "NGN $amount has been successfully added to your wallet",
        ]);

    }


    public function verify_username(request $request)
    {

        $get_user =  User::where('email', $request->email)->first() ?? null;

        if($get_user == null){

            return response()->json([
                'username' => "Not Found, Pleas try again"
            ]);

        }

        return response()->json([
            'username' => $get_user->username
        ]);



    }

}
