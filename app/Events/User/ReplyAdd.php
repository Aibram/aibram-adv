<?php

namespace App\Events\User;

use App\Models\AdComment;

class ReplyAdd extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AdComment $comment,$title)
    {
        $this->eventName = 'reply_added';
        $this->title = $title;
        parent::__construct($comment,$comment->parent->user_id);
    }
}
