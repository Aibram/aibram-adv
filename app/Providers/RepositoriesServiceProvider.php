<?php

namespace App\Providers;

use App\Interfaces\ActivationCodeRepositoryInterface;
use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ChatlistRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\ContactUsRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\FavoriteRepositoryInterface;
use App\Interfaces\ProhibitedWordRepositoryInterface;
use App\Interfaces\RatingRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use App\Interfaces\SettingsRepositoryInterface;
use App\Interfaces\TestimonialRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ActivationCodeRepository;
use App\Repositories\AdminRepository;
use App\Repositories\AdvertisementRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ChatlistRepository;
use App\Repositories\CityRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ContactUsRepository;
use App\Repositories\CountryRepository;
use App\Repositories\FavoriteRepository;
use App\Repositories\ProhibitedWordRepository;
use App\Repositories\RatingRepository;
use App\Repositories\ReportRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\TestimonialRepository;
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
        $this->app->bind(RatingRepositoryInterface::class,RatingRepository::class);
        $this->app->bind(FavoriteRepositoryInterface::class,FavoriteRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class,SettingsRepository::class);
        $this->app->bind(ReportRepositoryInterface::class,ReportRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class,TestimonialRepository::class);
        $this->app->bind(ChatlistRepositoryInterface::class,ChatlistRepository::class);
        $this->app->bind(ProhibitedWordRepositoryInterface::class,ProhibitedWordRepository::class);
        
    }
}
