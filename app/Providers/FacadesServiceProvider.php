<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('api.resp',function() {
            return new \App\Facades\Accessors\APIResponse;
        });
        App::bind('sms',function() {
            return new \App\Facades\Accessors\SMSService;
        });
        App::bind('random.code',function() {
            return new \App\Facades\Accessors\RandomCode;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
