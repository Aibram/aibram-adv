<?php

namespace App\Observers;

use App\Models\AdComment;

class CommentObserver
{
    /**
     * Handle the AdComment "created" event.
     *
     * @param  \App\Models\AdComment  $adComment
     * @return void
     */
    public function created(AdComment $adComment)
    {
        //
    }

    /**
     * Handle the AdComment "updated" event.
     *
     * @param  \App\Models\AdComment  $adComment
     * @return void
     */
    public function updated(AdComment $adComment)
    {
        //
    }

    /**
     * Handle the AdComment "deleted" event.
     *
     * @param  \App\Models\AdComment  $adComment
     * @return void
     */
    public function deleted(AdComment $adComment)
    {
        //
    }

    /**
     * Handle the AdComment "restored" event.
     *
     * @param  \App\Models\AdComment  $adComment
     * @return void
     */
    public function restored(AdComment $adComment)
    {
        //
    }

    /**
     * Handle the AdComment "force deleted" event.
     *
     * @param  \App\Models\AdComment  $adComment
     * @return void
     */
    public function forceDeleted(AdComment $adComment)
    {
        //
    }
}
