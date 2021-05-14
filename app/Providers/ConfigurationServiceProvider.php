<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['view']->addNamespace('admin', config('view.paths')[1]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // date_default_timezone_set('Africa/Cairo');
        \Schema::defaultStringLength(191);
    }
}
