<?php

namespace App\Http\Controllers\NoAuth;

use App\Facades\APIResponse;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\FavoriteRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends BaseController
{
    protected $repository,$favRepo;
    public function __construct(AdvertisementRepositoryInterface $repository,FavoriteRepositoryInterface $favRepo){
        $this->repository = $repository;
        $this->favRepo = $favRepo;
        parent::__construct();
    }

    public function getAds(Request $request)
    {
        if($request->user_id){
            Auth::guard('user')->setUser(User::find($request->user_id));
        }
        $ads = $this->repository->filterAds($request->only(['city_id','category_id','title']),4,$request->get('page',1));
        $items = collect($ads->items())->map->format();
        return APIResponse::sendResponse($this->getMsg(),[
            'grid' => view('parts.ads.ad-grid', ['ads'=>$items,'lazy' => false])->render(),
            'list' => view('parts.ads.ad-list', ['ads'=>$items,'lazy' => false])->render(),
            'adsCount' => count($ads),
            'hasMorePages' => $ads->hasMorePages()
        ]);
    }

    public function getHomeAds(Request $request)
    {
        if($request->get('user_id',null)){
            Auth::guard('user')->setUser(User::find($request->user_id));
        }
        $latestAds = $this->repository->filterAds(['home'=>1],6,$request->get('page',1));
        $items = collect($latestAds->items())->map->format();
        return APIResponse::sendResponse($this->getMsg(),[
            'list' => view('parts.ads.latest-home', ['ads'=>$items,'lazy' => false])->render(),
            'adsCount' => $latestAds->count(),
            'hasMorePages' => $latestAds->hasMorePages()
        ]);
    }

    public function addtoFavorite(Request $request)
    {
        $favItem = $this->favRepo->getFirstBy(['user_id'=>$request->user_id,'advertisement_id'=>$request->advertisement_id]);
        if($favItem){
            return APIResponse::sendResponse(__('base.error.already_favorite'),__('base.error.already_favorite'),401);
        }
        
        $fav = $this->favRepo->create($request->only(['user_id','advertisement_id']));
        $fav->advertisement()->increment('no_favorites');
        $fav->user()->increment('no_favorites');
        $fav->refresh();
        return APIResponse::sendResponse($this->getMsg(),[
            'message' => __('frontend.details.favorited_before'),
            'count' => $fav->advertisement->no_favorites
        ]);
    }

    public function removeFromFavorite(Request $request)
    {
        $favItem = $this->favRepo->getFirstBy(['user_id'=>$request->user_id,'advertisement_id'=>$request->advertisement_id]);
        if(!$favItem){
            return APIResponse::sendResponse(__('base.error.no_favorite_found'),__('base.error.no_favorite_found'),401);
        }
        $this->favRepo->deleteById($favItem->id);
        if($favItem->advertisement->no_favorites>0){
            $favItem->advertisement()->decrement('no_favorites');
        }
        if($favItem->user->no_favorites>0){
            $favItem->user()->decrement('no_favorites');
        }
        return APIResponse::sendResponse($this->getMsg(),[
            'message' => __('frontend.details.add_to_favorite'),
            'count' => $this->repository->findById($request->advertisement_id)->no_favorites
        ]);
    }

    
    
}
