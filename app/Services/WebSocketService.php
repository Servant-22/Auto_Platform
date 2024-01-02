<?php

namespace App\Services;

use WebSocket\Client;

class WebSocketService
{
    protected $webSocketClient;

    public function __construct()
    {
        $this->webSocketClient = new Client('ws://localhost:6005/ws/reminder/');
    }

    public function sendEmail($email, $message)
    {
        $emailData = json_encode(['action' => 'sendEmail', 'email' => $email, 'message' => $message]);
        $this->webSocketClient->send($emailData);
    }
}