<?php

namespace App\Notifications;

class AdRemovedAdmin extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}