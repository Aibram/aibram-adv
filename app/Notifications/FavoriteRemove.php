<?php

namespace App\Notifications;

use Illuminate\Database\Eloquent\Model;

class FavoriteRemove extends BaseNotification
{
    public function __construct(Model $data)
    {
        parent::__construct($data);
    }
}