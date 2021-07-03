<?php

namespace App\Events\User;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BaseEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $title='',$message,$eventName,$user_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Model $model,$user_id)
    {
        $this->message = [
            'title' => $this->title,
            'content' => $model
        ];
        $this->user_id = $user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['user.'.$this->user_id];
    }

    public function broadcastAs()
    {
        return $this->eventName;
    }
}
