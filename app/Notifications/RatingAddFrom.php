<?php

namespace App\Notifications;


class RatingAddFrom extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}