<?php

namespace App\Observers;

use App\Models\FavoriteItem;

class FavoriteObserver
{
    /**
     * Handle the FavoriteItem "created" event.
     *
     * @param  \App\Models\FavoriteItem  $favoriteItem
     * @return void
     */
    public function created(FavoriteItem $favoriteItem)
    {
        //
    }

    /**
     * Handle the FavoriteItem "updated" event.
     *
     * @param  \App\Models\FavoriteItem  $favoriteItem
     * @return void
     */
    public function updated(FavoriteItem $favoriteItem)
    {
        //
    }

    /**
     * Handle the FavoriteItem "deleted" event.
     *
     * @param  \App\Models\FavoriteItem  $favoriteItem
     * @return void
     */
    public function deleted(FavoriteItem $favoriteItem)
    {
        //
    }

    /**
     * Handle the FavoriteItem "restored" event.
     *
     * @param  \App\Models\FavoriteItem  $favoriteItem
     * @return void
     */
    public function restored(FavoriteItem $favoriteItem)
    {
        //
    }

    /**
     * Handle the FavoriteItem "force deleted" event.
     *
     * @param  \App\Models\FavoriteItem  $favoriteItem
     * @return void
     */
    public function forceDeleted(FavoriteItem $favoriteItem)
    {
        //
    }
}
