<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\RatingRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $adRepo,$userRepo,$ratingRepo;

    public function __construct(AdvertisementRepositoryInterface $adRepo,UserRepositoryInterface $userRepo, RatingRepositoryInterface $ratingRepo)
    {
        $this->adRepo = $adRepo;
        $this->userRepo = $userRepo;
        $this->ratingRepo = $ratingRepo;
    }
    public function home()
    {
        // dd(getAds([],null,6)[0]->toArray());
        return view('pages.home');
    }

    public function profile($id,Request $request)
    {
        $ad = $this->adRepo->findById($request->get('id',null));
        $user = $this->userRepo->findById($id);
        $ratings = $this->ratingRepo->allBy(['user_id'=>$user->id],['ratedUser'],['*'],['created_at'=>'desc']);
        return view('pages.profile',compact('ad','user','ratings'));
    }

    public function categories()
    {
        return view('pages.categories');
    }

    public function about()
    {
        return view('pages.about');
    }
}
