<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interfaces\ChatlistRepositoryInterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ChatlistRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function single($id,Request $request){
        $user1 = auth()->guard('user')->user()->id;
        $user2 = $id;
        $chat = $this->repository->firstOrNewChat($user1,$user2);
        return view('pages.chat',compact('chat'));
    }
}
