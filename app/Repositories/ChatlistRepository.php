<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Facades\NotificationInitator;
use App\Interfaces\ChatlistRepositoryInterface;
use App\Models\ChatList;
use App\Notifications\MessageReceived;
use App\Notifications\MessageSent;
use Spatie\Permission\Exceptions\UnauthorizedException;

class ChatlistRepository extends BaseAbstract implements ChatlistRepositoryInterface
{
    
    public function __construct(ChatList $model)
    {
        parent::__construct($model);
    }

    public function getSingleChatlist($user1Id,$user2Id){
        return $this->getModel()
        ->where(['sender_id'=>$user1Id,'receiver_id'=>$user2Id])
        ->orWhere(function ($query) use($user1Id,$user2Id){
            $query->where(['sender_id'=>$user2Id,'receiver_id'=>$user1Id]);
        })
        ->where('status',1)
        ->first();
    }

    public function getAllChatlistPerUser($userId){
        return $this->getModel()
        ->where(['sender_id'=>$userId])
        ->orWhere(['receiver_id'=>$userId])
        ->where('status',1)
        ->get();
    }

    public function firstOrNewChat($user1Id,$user2Id){
        $chat = $this->getSingleChatlist($user1Id,$user2Id);
        if(!$chat){
            $chat = $this->create([
                'sender_id'     =>  $user1Id,
                'receiver_id'   =>  $user2Id,
                'status'        =>  1,
            ]);
        }
        return $chat;
    }
    public function paginateMessages($id,$count=4,$page=1){
        $chatlist = $this->findById($id);
        if(!$chatlist){
            throw new UnauthorizedException(401,__('base.error.error'));
        }
        $chatlist = $chatlist->conversations()->paginate($count,['*'],'page',$page);
        return $chatlist;
    }
    public function sendMessage($data,$chatId){
        $chatlist = $this->findById($chatId);
        if(!$chatlist){
            throw new UnauthorizedException(401,__('base.error.error'));
        }
        $photo = $data['message_content'];
        if($data['message_type'] == "photo"){
            $data['message_content'] = '';
        }
        $message = $chatlist->conversations()->create($data);
        if($data['message_type'] == "photo"){
            $data['message_content'] = $photo;
            $this->CheckSingleMediaAndAssign($data, $message, 'message_content', $this->model->mainImageCollection);
            $chatlist->conversations()->where('id',$message->id)->update([
                'message_content' => $message->photo
            ]);
        }
        NotificationInitator::init($message,'chat',__('notifications.message_sent',['user' => $message->receiver->name]),$message->sender,MessageSent::class);
        NotificationInitator::init($message,'chat',__('notifications.message_received',['user' => $message->sender->name]),$message->receiver,MessageReceived::class);
        $message->refresh();
        return $message;
    }
    public function readMessages($data,$chatId){
        $chatlist = $this->findById($chatId);
        if(!$chatlist){
            throw new UnauthorizedException(401,__('base.error.error'));
        }
        $message = $chatlist->conversations()
        ->where('receiver_id',$data['sender_id'])
        ->whereNull('read_at')
        ->update([
            'read_at' => now()
        ]);
    }
}
