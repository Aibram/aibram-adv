<?php

namespace App\Notifications;

class MessageReceived extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}