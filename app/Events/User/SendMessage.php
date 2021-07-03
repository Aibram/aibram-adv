<?php

namespace App\Events\User;

use App\Models\ChatConversation;

class SendMessage extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChatConversation $message,$title)
    {
        $this->eventName = 'message_sent';
        $this->title = $title;
        parent::__construct($message,$message->receiver_id);
    }
}
