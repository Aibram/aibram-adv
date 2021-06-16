<?php

namespace App\Notifications;

class AdvertisementCreate extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
