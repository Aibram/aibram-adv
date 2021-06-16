<?php

namespace App\Notifications;

class FavoriteRemove extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}