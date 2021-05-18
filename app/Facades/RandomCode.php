<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RandomCode extends Facade {
    protected static function getFacadeAccessor() { return 'random.code'; }
}