<?php

namespace App\Notifications;


class RatingAddTo extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}