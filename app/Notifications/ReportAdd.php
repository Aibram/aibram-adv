<?php

namespace App\Notifications;


class ReportAdd extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}