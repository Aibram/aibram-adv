<?php

namespace App\Observers;

use App\Models\UserVisit;

class VisitObserver
{
    /**
     * Handle the UserVisit "created" event.
     *
     * @param  \App\Models\UserVisit  $userVisit
     * @return void
     */
    public function created(UserVisit $userVisit)
    {
        //
    }

    /**
     * Handle the UserVisit "updated" event.
     *
     * @param  \App\Models\UserVisit  $userVisit
     * @return void
     */
    public function updated(UserVisit $userVisit)
    {
        //
    }

    /**
     * Handle the UserVisit "deleted" event.
     *
     * @param  \App\Models\UserVisit  $userVisit
     * @return void
     */
    public function deleted(UserVisit $userVisit)
    {
        //
    }

    /**
     * Handle the UserVisit "restored" event.
     *
     * @param  \App\Models\UserVisit  $userVisit
     * @return void
     */
    public function restored(UserVisit $userVisit)
    {
        //
    }

    /**
     * Handle the UserVisit "force deleted" event.
     *
     * @param  \App\Models\UserVisit  $userVisit
     * @return void
     */
    public function forceDeleted(UserVisit $userVisit)
    {
        //
    }
}
