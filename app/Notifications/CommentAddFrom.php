<?php

namespace App\Notifications;

use Illuminate\Database\Eloquent\Model;

class CommentAddFrom extends BaseNotification
{
    public function __construct(Model $data)
    {
        $this->data = $data;
    }
}