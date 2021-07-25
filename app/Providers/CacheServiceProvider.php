<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class CacheServiceProvider extends ServiceProvider
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
        $this->app->singleton('settings', function($app) {
            return manipulateCache('cache_settings','cache_settings_data');
        });
        $this->app->singleton('testimonials', function($app) {
            return manipulateCache('cache_testimonials','cache_testimonials_data');
        });
    }
}
