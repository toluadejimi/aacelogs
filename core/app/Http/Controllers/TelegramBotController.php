<?php

namespace App\Http\Controllers;

use App\Models\Transfertransaction;
use App\Models\Webkey;
use Illuminate\Http\Request;
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

            $this->autoReply($chatId, $text);
        }

        if (isset($update['callback_query'])) {
            $this->handleCallbackQuery($update['callback_query']);
        }
    }


    protected function autoReply($chatId, $text)
    {
        $text = strtolower(trim($text));
        Log::info("Received message: $text from Chat ID: $chatId");

        // Handle commands
        if ($text === '/start') {
            return $this->sendMenu($chatId);
        }

        if ($text === 'hi') {
            return $this->sendMenu($chatId);
        }

        if (strpos($text, 'resolve') !== false) {
            return $this->sendMessage($chatId, "Enter your Account No to resolve a transaction.");
        }

        if (strpos($text, 'status') !== false) {
            return $this->sendMessage($chatId, "Enter your transaction reference to check status.");
        }

        if (strpos($text, 'help') !== false) {
            return $this->sendMessage($chatId, "How can I assist you?");
        }

        // Handle Account Number cases
        if (preg_match('/^(961|603|500|558)\d{7}$/', $text)) {
            return $this->handleTransaction($chatId, $text);
        }

        return $this->sendMessage($chatId, "Invalid command or account number. Please try again.");
    }

    protected function handleTransaction($chatId, $accountNo)
    {
        Log::info("Checking transaction for Account No: $accountNo");
        $trx = Transfertransaction::where('account_no', $accountNo)->first();

        if (!$trx) {
            Log::warning("No transaction found for Account No: $accountNo");
            return $this->handleUnknownTransaction($chatId, $accountNo);
        }

        $pref = $trx->ref;
        $amount = number_format($trx->amount);
        $email = $trx->email;
        $date = $trx->created_at;
        $sitename = Webkey::where('key', $trx->key)->first()->site_name ?? 'Unknown';

        $verify = $this->verifyTransaction($accountNo, $pref);

        if (!is_array($verify)) {
            return $this->sendMessage($chatId, "Error: Unexpected response format.");
        }

        return $this->sendTransactionStatus($chatId, $accountNo, $verify, $email, $date, $sitename, $amount);
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

    protected function sendMenu($chatId)
    {
        $keyboard = [
            'inline_keyboard' => [
                [['text' => 'Resolve Transaction', 'callback_data' => 'resolve']],
                [['text' => 'Check Status', 'callback_data' => 'status']],
                [['text' => 'Help', 'callback_data' => 'help']]
            ]
        ];

        $this->sendMessage($chatId, "Choose an option:", $keyboard);
    }

    protected function handleCallbackQuery($callbackQuery)
    {
        $chatId = $callbackQuery['message']['chat']['id'];
        $callbackData = $callbackQuery['data'];

        switch ($callbackData) {
            case 'resolve':
                $this->sendMessage($chatId, "Enter your Account No to resolve a transaction.");
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
