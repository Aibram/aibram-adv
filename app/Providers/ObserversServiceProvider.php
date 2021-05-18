<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\CityObserver;
use App\Observers\CountryObserver;
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
        Country::observe(CountryObserver::class);
        City::observe(CityObserver::class);
        Category::observe(CategoryObserver::class);

    }
}
