<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class NotificationInitator extends Facade {
    protected static function getFacadeAccessor() { return 'notification.init'; }
}