<?php

namespace App\Notifications;

class CommentRemovedAdmin extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}