<?php

namespace App\Interfaces;


interface ChatlistRepositoryInterface  extends BaseInterface
{
    public function getSingleChatlist($user1Id,$user2Id);
    public function getAllChatlistPerUser($userId);
    public function firstOrNewChat($user1Id,$user2Id);
    public function sendMessage($data,$chatId);
    public function paginateMessages($id,$count=4,$page=1);
    public function readMessages($data,$chatId);    

    
}
