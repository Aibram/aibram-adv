<?php

namespace App\Http\Controllers\Website;

use App\Facades\NotificationInitator;
use App\Facades\SeoInit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ReportRequest;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\RatingRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Notifications\RatingAddFrom;
use App\Notifications\RatingAddTo;
use App\Notifications\ReportAdd;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $adRepo,$userRepo,$ratingRepo,$reportRepo;

    public function __construct(AdvertisementRepositoryInterface $adRepo,UserRepositoryInterface $userRepo, RatingRepositoryInterface $ratingRepo,ReportRepositoryInterface $reportRepo)
    {
        $this->adRepo = $adRepo;
        $this->userRepo = $userRepo;
        $this->ratingRepo = $ratingRepo;
        $this->reportRepo = $reportRepo;
    }
    public function home()
    {
        // dd(request()->route()->getName());
        SeoInit::list('Aibram','مرحبًا بكم في أكبر منصة للاعلانات',route('frontend.home'),asset('frontend/assets/img/hero-area.jpg'),['Aibram','Ads','ads','categories']);
        $latestAds = $this->adRepo->filterAds(['home'=>1],6,1,['created_at' => 'desc']);
        $featuredAds = checkLoggedIn('user') ? $this->adRepo->featuredAds(currUser('user')) : [];
        return view('pages.home',compact('latestAds','featuredAds'));
    }

    public function profile($id,Request $request)
    {
        if(checkLoggedIn('user') && currUser('user')->id == $id){
            return redirect()->route('frontend.dashboard.all');
        }
        // $ad = $this->adRepo->findById($request->get('id',null));
        $user = $this->userRepo->findById($id);
        $ratings = $this->ratingRepo->allBy(['user_id'=>$user->id],['ratedUser'],['*'],['created_at'=>'desc']);
        return view('pages.profile',compact('user','ratings'));
    }

    public function add_rating($id,Request $request){
        $user = $this->userRepo->findById($id);
        $data = $request->only(['stars','comment']);
        $data['rated_user_id'] = $id;
        $data['user_id'] = auth()->guard()->user()->id;
        $rating = $this->ratingRepo->create($data);
        $rating->ratedUser()->increment('no_ratings');
        $rating->ratedUser()->update(['avg_rate'=>$rating->ratedUser->avg_rate_derived]);
        NotificationInitator::init($rating,'rating_add_from',__('notifications.rating_add_from',['name' => $user->name]),currUser('user'),RatingAddFrom::class);
        NotificationInitator::init($rating,'rating_add_to',__('notifications.rating_add_to',['name' => currUser('user')->name]),$user,RatingAddTo::class);
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return redirect()->route('frontend.profile',['id'=>$id]);
    }

    public function categories()
    {
        return view('pages.categories');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function report(Request $request){
        $request->session()->put('reportable_type', $request->type);
        $request->session()->put('reportable_id', $request->id);
        return view('pages.report');
    }
    public function submitReport(ReportRequest $request){
        $reportable_type = $request->session()->get('reportable_type');
        $reportable_id = $request->session()->get('reportable_id');
        $report = $this->reportRepo->create([
            'comment' => $request->comment,
            'reportable_id' => $reportable_id,
            'reportable_type' => $reportable_type,
            'user_id' => currUser('user')->id
        ],false);
        NotificationInitator::init($report,'report',__('notifications.report',['report_type' => __('base.'.$reportable_type)]),currUser('user'),ReportAdd::class);
        $request->session()->forget(['reportable_type', 'reportable_id']);
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return redirect()->route('frontend.home');
    }
}
