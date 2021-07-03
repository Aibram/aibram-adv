<?php

namespace App\Events\User;

use App\Models\AdComment;

class CommentAdd extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AdComment $comment,$title)
    {
        $this->eventName = 'comment_added';
        $this->title = $title;
        parent::__construct($comment,$comment->advertisement->user_id);
    }
}
