<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\UpdateProfile;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\ChatlistRepositoryInterface;
use App\Interfaces\FavoriteRepositoryInterface;
use App\Interfaces\RatingRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $adRepo,
            $userRepo,
            $ratingRepo,
            $favoriteRepo,
            $chatlistRepo,
            $me;

    public function __construct(Request $request,AdvertisementRepositoryInterface $adRepo,UserRepositoryInterface $userRepo, RatingRepositoryInterface $ratingRepo, FavoriteRepositoryInterface $favoriteRepo, ChatlistRepositoryInterface $chatlistRepo)
    {
        $this->adRepo = $adRepo;
        $this->userRepo = $userRepo;
        $this->ratingRepo = $ratingRepo;
        $this->favoriteRepo = $favoriteRepo;
        $this->chatlistRepo = $chatlistRepo;
        $this->middleware(function ($request, $next) {
            $this->me = auth()->guard('user')->user();
            return $next($request);
        });
    }

    public function all(Request $request)
    {
        $ads = $this->adRepo->getByCondition(['where'=>['user_id'=>$this->me->id,'status'=>1],'paginate'=>10,'order'=>['created_at'=>'desc']]);

        return view('pages.dashboard-home',compact('ads'));
    }

    public function chats(Request $request)
    {
        $chats = $this->chatlistRepo->getAllChatlistPerUser(auth()->guard('user')->user()->id);
        return view('pages.dashboard-chats',compact('chats'));
    }

    public function ratings(Request $request)
    {
        
        $ratings = $this->ratingRepo->getByCondition(['where'=>['user_id'=>$this->me->id],'paginate'=>10,'order'=>['created_at'=>'desc']]);
        return view('pages.dashboard-ratings',compact('ratings'));
    }

    public function notifications(Request $request)
    {
        $notifications = $this->me->notifications()->paginate(10);
        $notifications->map(function($n) {
            if(!$n->read_at){
                $n->markAsRead();
            }
        });
        return view('pages.dashboard-notifications',compact('notifications'));
    }

    public function favorites(Request $request)
    {
        $favorites = $this->favoriteRepo->getByCondition(['where'=>['user_id'=>$this->me->id],'paginate'=>10,'order'=>['created_at'=>'desc']]);
        return view('pages.dashboard-favorites',compact('favorites'));
    }

    public function account(Request $request)
    {
        $user = $this->me;
        return view('pages.dashboard-account',compact('user'));
    }

    public function updateAccount(UpdateProfile $request)
    {
        // dd($request->all());
        $this->userRepo->updateFullUser($this->me->id,$request->validated());
        return redirect()->back();
    }
}
