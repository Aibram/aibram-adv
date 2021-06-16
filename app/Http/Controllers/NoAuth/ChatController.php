<?php

namespace App\Http\Controllers\NoAuth;

use App\Facades\APIResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\ChatlistRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends BaseController
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
    public function getMessages($id,Request $request){
        if($request->sender_id){
            Auth::guard('user')->setUser(User::find($request->sender_id));
        }
        try{
            $this->repository->readMessages($request->all(),$id);
            $messages = $this->repository->paginateMessages($id,10,$request->get('page',1));
            return APIResponse::sendResponse($this->getMsg(),[
                'messageView' => view('parts.chat.messages', ['messages'=>$messages->items()])->render(),
                'messagesCount' => count($messages),
                'hasMorePages' => $messages->hasMorePages()
            ]);
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
        
    }
    public function sendMessage($id,Request $request){
        Auth::guard('user')->setUser(User::find($request->sender_id));
        try{
            $message = $this->repository->sendMessage($request->all(),$id);
            return APIResponse::sendResponse($this->getMsg(),[
                'messageView' => view('parts.chat.messages', ['messages'=>[$message]])->render(),
            ]);
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
        
    }
    public function readMessages($id,Request $request){
        try{
            $this->repository->readMessages($request->all(),$id);
            return APIResponse::sendResponse($this->getMsg(),[]);
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
    }
}
