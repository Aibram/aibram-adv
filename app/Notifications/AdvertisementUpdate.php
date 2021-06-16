<?php

namespace App\Notifications;

class AdvertisementUpdate extends BaseNotification
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}