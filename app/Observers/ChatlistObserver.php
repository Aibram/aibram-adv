<?php

namespace App\Observers;

use App\Models\Chatlist;

class ChatlistObserver
{
    /**
     * Handle the Chatlist "created" event.
     *
     * @param  \App\Models\Chatlist  $chatlist
     * @return void
     */
    public function created(Chatlist $chatlist)
    {
        $chatlist->receiver()->increment('no_chats');
        $chatlist->sender()->increment('no_chats');
    }

    /**
     * Handle the Chatlist "updated" event.
     *
     * @param  \App\Models\Chatlist  $chatlist
     * @return void
     */
    public function updated(Chatlist $chatlist)
    {
        //
    }

    /**
     * Handle the Chatlist "deleted" event.
     *
     * @param  \App\Models\Chatlist  $chatlist
     * @return void
     */
    public function deleted(Chatlist $chatlist)
    {
        //
    }

    /**
     * Handle the Chatlist "restored" event.
     *
     * @param  \App\Models\Chatlist  $chatlist
     * @return void
     */
    public function restored(Chatlist $chatlist)
    {
        //
    }

    /**
     * Handle the Chatlist "force deleted" event.
     *
     * @param  \App\Models\Chatlist  $chatlist
     * @return void
     */
    public function forceDeleted(Chatlist $chatlist)
    {
        //
    }
}
