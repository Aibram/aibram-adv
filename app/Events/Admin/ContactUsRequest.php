<?php

namespace App\Events\Admin;

use App\Models\ContactUs;

class ContactUsRequest extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ContactUs $report,$title)
    {
        $this->eventName = 'contactus_request';
        $this->title = $title;
        parent::__construct($report);
    }
}
