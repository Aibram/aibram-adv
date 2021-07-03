<?php

namespace App\Notifications;

use App\Events\Admin\AdvertisementCreated;
use Illuminate\Database\Eloquent\Model;

class AdvertisementCreate extends BaseNotification
{
    public function __construct(Model $data)
    {
        parent::__construct($data);
        event(new AdvertisementCreated($data,__('notifications.admin.new_advertisement_created')));
    }
}
