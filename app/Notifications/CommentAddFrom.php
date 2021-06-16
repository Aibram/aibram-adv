<?php

namespace App\Notifications;

class CommentAddFrom extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}