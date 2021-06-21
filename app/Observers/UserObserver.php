<?php

namespace App\Observers;

use App\Models\City;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $country = $user->city->country;
        $user->country_id = $country->id;
        $user->country()->increment('no_users');
        $user->city()->increment('no_users');

        // $user->ext = $country->ext;
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updating(User $user)
    {
        if ($user->isDirty(['city_id'])){
            $city = City::where('id','=',$user->getOriginal('city_id'));
            if($city->no_users>0){
                $city->decrement('no_users');
            }
            if($city->country()->no_users>0){
                $city->country()->decrement('no_users');
            }
        }
        $user->country_id = $user->city->country->id;
    }

    public function updated(User $advertisement){
        if ($advertisement->isDirty(['city_id'])){
            $advertisement->city()->increment('no_users');
            $advertisement->country()->increment('no_users');
        }
    }

    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        $user->codes()->delete();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
