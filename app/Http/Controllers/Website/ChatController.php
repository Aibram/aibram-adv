<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\ChatlistRepositoryInterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    protected $repository,$adRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdvertisementRepositoryInterface $adRepo,ChatlistRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->adRepo = $adRepo;
    }
    public function single($id,Request $request){
        $user1 = currUser('user')->id;
        $user2 = $id;
        $chat = $this->repository->firstOrNewChat($user1,$user2)->format();
        $advertisement = null;
        if($request->query('id')){
            $advertisement = $this->adRepo->findById($request->query('id'))->format();
        }
        return view('pages.chat',compact('chat','advertisement'));
    }
}
