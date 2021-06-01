<?php

namespace App\Observers;

use App\Models\UserRating;

class RatingObserver
{
    /**
     * Handle the UserRating "created" event.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return void
     */
    public function created(UserRating $userRating)
    {
        $userRating->advertisement()->increment('no_favorites');
    }

    /**
     * Handle the UserRating "updated" event.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return void
     */
    public function updated(UserRating $userRating)
    {
        //
    }

    /**
     * Handle the UserRating "deleted" event.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return void
     */
    public function deleted(UserRating $userRating)
    {
        //
    }

    /**
     * Handle the UserRating "restored" event.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return void
     */
    public function restored(UserRating $userRating)
    {
        //
    }

    /**
     * Handle the UserRating "force deleted" event.
     *
     * @param  \App\Models\UserRating  $userRating
     * @return void
     */
    public function forceDeleted(UserRating $userRating)
    {
        //
    }
}
