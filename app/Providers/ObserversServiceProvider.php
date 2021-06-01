<?php

namespace App\Providers;

use App\Models\AdComment;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\FavoriteItem;
use App\Models\Report;
use App\Models\User;
use App\Models\UserRating;
use App\Models\UserVisit;
use App\Observers\AdvertisementObserver;
use App\Observers\CategoryObserver;
use App\Observers\CityObserver;
use App\Observers\CommentObserver;
use App\Observers\CountryObserver;
use App\Observers\FavoriteObserver;
use App\Observers\RatingObserver;
use App\Observers\ReportObserver;
use App\Observers\UserObserver;
use App\Observers\VisitObserver;
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
        Advertisement::observe(AdvertisementObserver::class);
        Category::observe(CategoryObserver::class);
        City::observe(CityObserver::class);
        Country::observe(CountryObserver::class);
        User::observe(UserObserver::class);
        FavoriteItem::observe(FavoriteObserver::class);
        UserVisit::observe(VisitObserver::class);
        UserRating::observe(RatingObserver::class);
        Report::observe(ReportObserver::class);
        AdComment::observe(CommentObserver::class);

    }
}
