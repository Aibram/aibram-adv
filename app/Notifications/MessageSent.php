<?php

namespace App\Notifications;

class MessageSent extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}