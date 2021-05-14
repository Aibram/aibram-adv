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

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
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
