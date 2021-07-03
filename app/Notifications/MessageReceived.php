<?php

namespace App\Notifications;

use App\Events\User\SendMessage;
use Illuminate\Database\Eloquent\Model;

class MessageReceived extends BaseNotification
{
    public function __construct(Model $data)
    {
        event(new SendMessage($data,__('notifications.user.new_message')));
        parent::__construct($data);
    }
}