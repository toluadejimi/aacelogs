<?php

namespace App\Services;

use Telegram\Bot\Api;

class TelegramService
{
    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }

    // Send message to a user
    public function sendMessage($chatId, $text)
    {
        return $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }

    // Get updates from Telegram (new messages, etc.)
    public function getUpdates()
    {
        return $this->telegram->getUpdates();
    }
}
