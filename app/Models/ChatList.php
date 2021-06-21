<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ChatConversation;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatList extends BaseModel
{
    use SoftDeletes,HasFactory;

    public $fillable = [
        'sender_id',
        'receiver_id',
        'advertisement_id',
        'status',
        'no_messages',
    ];

    public function format(){
        $user = auth()->guard('user')->user();
        $receiver = $user->id == $this->sender_id ? $this->receiver : $this->sender;
        $lastMessage = optional($this->last_message);
        $isOnline = checkOnline($receiver->id);
        return [
            "id" => $this->id,
            "lastMessageContent" => $lastMessage->message_content,
            "lastMessageType" => $lastMessage->message_type,
            "lastMessage" => $lastMessage,
            "receiverName" => $receiver->name,
            "receiverPhoto" => $receiver->photo,
            "unreadCount" => $this->conversations()->whereNull("read_at")->count(),
            "detailsUrl" => route('frontend.chat.single',['id'=>$receiver->id]),
            "receiver" => $receiver,
            "status" => $isOnline? __('base.user_online') : __('base.user_offline'),
            "active" => $isOnline? 'y' : 'n',
            "isOnline" => $isOnline,
        ];
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    
    public function getLastMessageAttribute()
    {
        return $this->conversations()->latest()->first();
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }

    public function conversations()
    {
        return $this->hasMany(ChatConversation::class, 'chatlist_id', 'id')->orderBy('created_at','desc');
    }
}
