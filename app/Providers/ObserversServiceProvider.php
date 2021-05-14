<?php

namespace App\Providers;

use App\Models\City;
use App\Models\User;
use App\Observers\CityObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserversServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        City::observe(CityObserver::class);

    }
}
