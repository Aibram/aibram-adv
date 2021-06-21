<?php

namespace App\Observers;

use App\Models\City;
use App\Models\Country;

class CityObserver
{
    /**
     * Handle the City "created" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function created(City $city)
    {
        $city->country()->increment('no_cities');
    }

    /**
     * Handle the City "updated" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function updating(City $city)
    {
        if ($city->isDirty(['country_id'])){
            $city->country()->decrement('no_cities');
        }
        $city->country_id = $city->city->country->id;
    }

    public function updated(City $city){
        if ($city->isDirty(['country_id'])){
            $city->country()->increment('no_cities');
        }
    }

    /**
     * Handle the City "deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function deleted(City $city)
    {
        //
    }

    /**
     * Handle the City "restored" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function restored(City $city)
    {
        //
    }

    /**
     * Handle the City "force deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function forceDeleted(City $city)
    {
        //
    }
}
