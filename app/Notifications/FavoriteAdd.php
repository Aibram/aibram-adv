<?php

namespace App\Notifications;

class FavoriteAdd extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}