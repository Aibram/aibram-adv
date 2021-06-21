<?php

namespace App\Notifications;

class AdminSendNotification extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}