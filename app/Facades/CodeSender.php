<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CodeSender extends Facade {
    protected static function getFacadeAccessor() { return 'code.sender'; }
}