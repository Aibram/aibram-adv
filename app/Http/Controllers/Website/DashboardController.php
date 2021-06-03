<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\UpdateProfile;
use App\Interfaces\AdvertisementRepositoryInterface;
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
            $me;

    public function __construct(Request $request,AdvertisementRepositoryInterface $adRepo,UserRepositoryInterface $userRepo, RatingRepositoryInterface $ratingRepo, FavoriteRepositoryInterface $favoriteRepo)
    {
        $this->adRepo = $adRepo;
        $this->userRepo = $userRepo;
        $this->ratingRepo = $ratingRepo;
        $this->favoriteRepo = $favoriteRepo;
        $this->middleware(function ($request, $next) {
            $this->me = auth()->guard('user')->user();
            return $next($request);
        });
    }

    public function all(Request $request)
    {
        $ads = $this->adRepo->allBy(['user_id'=>$this->me->id],[],['*'],['created_at'=>'desc']);
        return view('pages.dashboard-home',compact('ads'));
    }

    public function chats(Request $request)
    {
        // $ads = $this->adRepo->allBy(['user_id'=>$this->me->id],[],['*'],['created_at'=>'desc']);
        return view('pages.dashboard-chats');
    }

    public function ratings(Request $request)
    {
        $ratings = $this->ratingRepo->allBy(['user_id'=>$this->me->id],[],['*'],['created_at'=>'desc']);
        return view('pages.dashboard-ratings',compact('ratings'));
    }

    public function favorites(Request $request)
    {
        $favorites = $this->favoriteRepo->allBy(['user_id'=>$this->me->id],[],['*'],['created_at'=>'desc']);
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
