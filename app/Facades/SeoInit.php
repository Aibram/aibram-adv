<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SeoInit extends Facade {
    protected static function getFacadeAccessor() { return 'seo.init'; }
}