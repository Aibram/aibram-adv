<?php

namespace App\Notifications;

class ReportConfirmed extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}