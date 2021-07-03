<?php

namespace App\Notifications;

use App\Events\User\CommentAdd;
use App\Events\User\ReplyAdd;
use App\Models\AdComment;
use Illuminate\Database\Eloquent\Model;

class CommentAddTo extends BaseNotification
{
    public function __construct(AdComment $data)
    {
        if($data->parent_id){
            event(new ReplyAdd($data,__('notifications.user.new_reply')));
        }
        else{
            event(new CommentAdd($data,__('notifications.user.new_comment')));
        }
        parent::__construct($data);
    }
}