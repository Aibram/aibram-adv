<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatConversation extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'sender_id',
        'receiver_id',
        'chatlist_id',
        'advertisement_id',
        'status',
        'message_type',
        'message_content',
        'read_at',
    ];

    
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function chatlist()
    {
        return $this->belongsTo(Chatlist::class, 'chatlist_id');
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }
}
