<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\Image;
use Optix\Media\Facades\Conversion;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Conversion::register('ads_thumbnail', function (Image $image) {
            return $image->fit(420, 270);
        });

        Conversion::register('ads_photos', function (Image $image) {
            return $image->fit(420, 270);
        });

        Conversion::register('category_icon', function (Image $image) {
            return $image->fit(64, 64);
        });

        Conversion::register('user_thumb', function (Image $image) {
            return $image->fit(150, 150);
        });

        Paginator::useBootstrap();
    }
}
