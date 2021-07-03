<?php

namespace App\Notifications;

use Illuminate\Database\Eloquent\Model;

class AdminSendNotification extends BaseNotification
{
    public function __construct(Model $data)
    {
        parent::__construct($data);
    }
}