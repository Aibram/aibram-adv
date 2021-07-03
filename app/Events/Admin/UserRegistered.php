<?php

namespace App\Events\Admin;

use App\Models\User;

class UserRegistered extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user,$title)
    {
        $this->eventName = 'user_registered';
        $this->title = $title;
        parent::__construct($user);
    }
}