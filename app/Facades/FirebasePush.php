<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FirebasePush extends Facade {
    protected static function getFacadeAccessor() { return 'firebase.push'; }
}