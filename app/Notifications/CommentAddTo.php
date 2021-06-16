<?php

namespace App\Notifications;

class CommentAddTo extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}