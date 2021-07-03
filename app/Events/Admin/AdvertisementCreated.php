<?php

namespace App\Events\Admin;

use App\Models\Advertisement;

class AdvertisementCreated extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Advertisement $ad,$title)
    {
        $this->eventName = 'ad_created';
        $this->title = $title;
        parent::__construct($ad);
    }
}
