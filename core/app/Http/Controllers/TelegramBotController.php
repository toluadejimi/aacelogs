<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transfertransaction;
use App\Models\User;
use App\Models\Webkey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TelegramBotController extends Controller
{
    protected $telegramToken;

    public function __construct()
    {
        $this->telegramToken = env('TELEGRAM_BOT_TOKEN');
    }

    public function handleWebhook(Request $request)
    {
        $update = $request->all();

        if (isset($update['message'])) {
            $message = $update['message'];
            $chatId = $message['chat']['id'];
            $text = $message['text'] ?? '';
            $username = $update['message']['from']['username'] ?? null;

            $this->autoReply($chatId, $text, $username);
        }

        if (isset($update['callback_query'])) {
            $this->handleCallbackQuery($update['callback_query']);
        }
    }


    protected function autoReply($chatId, $text, $username)
    {
        $text = strtolower(trim($text));
        Log::info("Received message: $text from Chat ID: $chatId");

        // Handle commands
        if ($text === '/start') {

            $tid = User::where('telegram_id', $chatId)->first() ?? null;
            if($tid == null){
                return $this->sendMenuRegister($chatId);
            }else{
                $username = $tid->username;
                return $this->sendMenu($chatId, $username);
            }

        }

        if ($text === 'hello') {

            $tid = User::where('telegram_id', $chatId)->first() ?? null;
            if($tid == null){
                return $this->sendMenuRegister($chatId);
            }else{
                $username = $tid->username;
                return $this->sendMenu($chatId, $username);
            }

        }

        if ($text === 'hi') {
            $tid = User::where('telegram_id', $chatId)->first() ?? null;
            if($tid == null){
                return $this->sendMenuRegister($chatId);
            }else{
                $username = $tid->username;
                return $this->sendMenu($chatId, $username);
            }
        }

        if (strpos($text, 'resolve') !== false) {
            return $this->sendMessage($chatId, "Enter your Account No to resolve a transaction.");
        }

        if (strpos($text, 'buy') !== false) {
            $categories = Category::latest()->where('status', 1)->get();
            $keyboardButtons = [];
            foreach ($categories as $data) {
                $keyboardButtons[] = [['text' => $data->name, 'callback_data' => 'buyaccount_' . $data->id]];
            }

            $keyboard = [
                'inline_keyboard' => $keyboardButtons
            ];

            $this->sendMessage($chatId, "Choose the type of account to buy", $keyboard);

        }

        if (strpos($text, 'status') !== false) {
            return $this->sendMessage($chatId, "Enter your transaction reference to check status.");
        }

        if (strpos($text, 'help') !== false) {
            return $this->sendMessage($chatId, "How can I assist you?");
        }

        if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $text, $matches)) {

           $get_user =  User::where('email', $matches[0])->first() ?? null;
           if($get_user == null){

               $new_user = new User();
               $new_user->email = $matches[0];
               $new_user->telegram_id = $chatId;
               $new_user->username = $username ?? $chatId;
               $new_user->save();

               return $this->sendMessage($chatId,  $matches[0]. " Successfully Registred on AcelogBot");


           }else{
               User::where('email', $matches[0])->update(['telegram_id' => $chatId ]) ?? null;
               return $this->sendMessage($chatId, $matches[0]. " Successfully Linked with AcelogBot");
           }

        }

        if (preg_match('/^\d+\.00$/', $text)) {

            if($text < 1000){
                return $this->sendMessage($chatId, "Minmum funding is 1000.00");
            }

            $user = User::where('telegram_id', $chatId)->first();


            $trx_id = "TRXTG".random_int(000000, 999999);
            $trx = new Deposit();
            $trx->trx = $trx_id;
            $trx->status = 0;
            $trx->user_id = $user->id;
            $trx->amount = $text;
            $trx->method_code = 250;
            $trx->save();

            $pt = "Telegram";

            $key = env('WEBKEY');
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://web.sprintpay.online/pay?amount=$text&key=$key&ref=$trx_id&email=$user->email&platform=$pt",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 20,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                ),
            ));

            $var = curl_exec($curl);
            curl_close($curl);
            $var = json_decode($var);

            return $this->sendMessage($chatId,

                "Transfer Exactly $var->amount to avoid delays \n\n"
                . "Bank: $var->bank\n\n"
                . "Account No: $var->account_no\n\n"
                . "Account Name: $var->account_name\n\n"

            );

        }




    }

    protected function handleTransaction($chatId, $amount, $trx_id)
    {



        //return $this->sendTransactionStatus();
    }

    protected function verifyTransaction($accountNo, $pref)
    {
        if (stripos($accountNo, '961') === 0) {
            return verifypelpaytelegram($pref);
        } elseif (stripos($accountNo, '603') === 0 || stripos($accountNo, '500') === 0) {
            return verify_telegram_payment_woven($accountNo);
        } elseif (stripos($accountNo, '558') === 0) {
            return verifypsbtelegram($accountNo);
        }
        return null;
    }

    protected function sendTransactionStatus($chatId, $accountNo, $verify, $email, $date, $sitename, $amount)
    {
        $statusMessages = [
            0 => "still pending 🥺\n\nWe are sorry for any inconveniences!",
            90 => "Failed ❌\n\nIf you have been debited, please raise a dispute on your bank app.",
            91 => "Account no not found please contact support for more information",
            4 => "already been funded ✅",
            5 => "part payment received. 🔄",
            2 => "Transaction Completed ✅",
            6 => "Transaction reversed 🔄\n\nSuccessfully reversed back to your account."
        ];

        $status = $statusMessages[$verify['code']] ?? "processing resolve 🔄";

        $vv = json_encode($verify);

        return $this->sendMessage($chatId, "Account No: $accountNo  | $status\n\n"
            . "Transaction Details:\n"
            . "Email: $email\n"
            . "Date/Time: $date\n"
            . "Website: $sitename\n"
            . "Amount: $amount");
    }

    protected function handleUnknownTransaction($chatId, $accountNo)
    {
        $verify = $this->verifyTransaction($accountNo, $accountNo);
        if (!is_array($verify)) {
            return $this->sendMessage($chatId, "Account No: $accountNo | Not Found ❌\nPlease verify and try again.");
        }

        return $this->sendTransactionStatus($chatId, $accountNo, $verify, 'N/A', 'N/A', 'N/A', 'N/A');
    }

    protected function sendMenu($chatId, $username)
    {


        $keyboard = [
            'inline_keyboard' => [
                [['text' => 'Buy Accounts', 'callback_data' => 'buy']],
                [['text' => 'My Orders', 'callback_data' => 'orders']],
                [['text' => 'Fund Wallet', 'callback_data' => 'fund']],
                [['text' => 'My Profile', 'callback_data' => 'profile']]
            ]
        ];

        $this->sendMessage($chatId, "Welcome to AcelogStore | $username | Choose an option:", $keyboard);
    }



    protected function sendMenuRegister($chatId)
    {


        $keyboard = [
            'inline_keyboard' => [
                [['text' => 'Link Account', 'callback_data' => 'link']],
                [['text' => 'New Registration', 'callback_data' => 'register']],
                [['text' => 'Need Help', 'callback_data' => 'help']]
            ]
        ];

        $this->sendMessage($chatId, "Welcome to AcelogStore  | Choose an option:", $keyboard);
    }

    protected function handleCallbackQuery($callbackQuery)
    {
        $chatId = $callbackQuery['message']['chat']['id'];
        $callbackData = $callbackQuery['data'];

        Log::info("Received message: $chatId callbackdata: $callbackData");


        switch ($callbackData) {

            case 'resolve':
                $this->sendMessage($chatId, "Enter your Account No to resolve a transaction.");
                break;


            case 'buy':
                $categories = Category::latest()->where('status', 1)->get();
                $keyboardButtons = [];
                foreach ($categories as $data) {
                    $keyboardButtons[] = [['text' => $data->name, 'callback_data' => 'buyaccount_' . $data->id]];
                }

                $keyboard = [
                    'inline_keyboard' => $keyboardButtons
                ];

                $this->sendMessage($chatId, "Choose the type of account to buy", $keyboard);
                break;


            case 'profile':

                $user = User::where('telegram_id', $chatId)->first();
                $bal =  number_format(User::where('telegram_id', $chatId)->first()->balance,2);
                $count_order = number_format(Order::where('user_id', $user->id)->where('status', 1)->count(),2);
                $order_sum = number_format(Order::where('user_id', $user->id)->where('status', 1)->sum('total_amount'), 2);


                $this->sendMessage($chatId,

                    "Email: $user->email  \n\n"
                    . "Balance: $bal  \n\n"
                    . "Total Order: $count_order\n\n"
                    . "Total Spent: NGN.$order_sum\n\n"

                );

                break;



            case (preg_match('/^buyaccount_\d+$/', $callbackData) ? $callbackData : null):
                $categoryId = str_replace('buyaccount_', '', $callbackData);
                $products = Product::where('category_id', $categoryId)->where('status', 1)->get();
                if ($products->isEmpty()) {
                    return $this->sendMessage($chatId, "No products available for this category.");
                }

                $keyboardButtons = [];
                foreach ($products as $product) {
                    $keyboardButtons[] = [['text' =>  "₦".number_format($product->price, 2)." | ". $product->name, 'callback_data' => 'product_' . $product->id]];
                }

                $keyboard = [
                    'inline_keyboard' => $keyboardButtons
                ];

                $this->sendMessage($chatId, "Select a product to purchase:", $keyboard);
                break;


                case (preg_match('/^product_\d+$/', $callbackData) ? $callbackData : null):
                    $balance = User::where('telegram_id', $chatId)->first()->balance;
                    $money = number_format(User::where('telegram_id', $chatId)->first()->balance, 2);
                    $pId = str_replace('product_', '', $callbackData);
                    $pbalance = Product::where('id', $pId)->first()->price;

                    if($pbalance > $balance){
                        $keyboard = [
                            'inline_keyboard' => [
                                [['text' => 'Fund Wallet', 'callback_data' => 'fund']]
                            ]
                        ];
                        $this->sendMessage($chatId, "Insufficient Funds | Your Bal is: ₦".$money, $keyboard);
                    }

                    break;



                case 'link':
                $this->sendMessage($chatId, "Enter your Email on Acelogstore.com");
                break;


                case 'fund':
                $this->sendMessage($chatId, "Enter amount to fund Ex 1000.00");
                break;

                case 'register':
                $this->sendMessage($chatId, "Enter your Email to register");
                break;

            case 'status':
                $this->sendMessage($chatId, "Enter your transaction reference to check status.");
                break;
            case 'help':
                $this->sendMessage($chatId, "How can I assist you?");
                break;
        }
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
}
