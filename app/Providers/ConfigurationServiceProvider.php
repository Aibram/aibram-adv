<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(125);
        $this->app->singleton('notificationsCount', function($app) {
            $notificationsCount = 0;
            foreach(config('app.main_guards') as $guard){
                if(checkLoggedIn($guard)){
                    $notificationsCount = currUser('user')->unreadNotifications()->count();
                    break;
                }
            }
            return $notificationsCount;
        });
    }
}
