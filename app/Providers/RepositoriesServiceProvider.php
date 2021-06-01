<?php

namespace App\Providers;

use App\Interfaces\ActivationCodeRepositoryInterface;
use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\ContactUsRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ActivationCodeRepository;
use App\Repositories\AdminRepository;
use App\Repositories\AdvertisementRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ContactUsRepository;
use App\Repositories\CountryRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(ActivationCodeRepositoryInterface::class,ActivationCodeRepository::class);
        $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
        $this->app->bind(AdvertisementRepositoryInterface::class,AdvertisementRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(CityRepositoryInterface::class,CityRepository::class);
        $this->app->bind(CountryRepositoryInterface::class,CountryRepository::class);
        $this->app->bind(ContactUsRepositoryInterface::class,ContactUsRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
    }
}
