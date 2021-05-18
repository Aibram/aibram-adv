<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class APIResponse extends Facade {
    protected static function getFacadeAccessor() { return 'api.resp'; }
}