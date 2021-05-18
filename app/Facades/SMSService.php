<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SMSService extends Facade {
    protected static function getFacadeAccessor() { return 'sms'; }
}