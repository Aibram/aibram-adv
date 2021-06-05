<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ReportRequest;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\RatingRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
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

    public function report(Request $request){
        $request->session()->put('reportable_type', $request->type);
        $request->session()->put('reportable_id', $request->id);
        return view('pages.report');
    }
    public function submitReport(ReportRequest $request){
        $reportable_type = $request->session()->get('reportable_type');
        $reportable_id = $request->session()->get('reportable_id');
        $this->reportRepo->create([
            'comment' => $request->comment,
            'reportable_id' => $reportable_id,
            'reportable_type' => $reportable_type,
            'user_id' => auth()->guard('user')->user()->id
        ],false);
        $request->session()->forget(['reportable_type', 'reportable_id']);
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return redirect()->route('frontend.home');
    }
}
