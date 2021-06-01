<?php

namespace App\Http\Controllers\Website;

use App\Facades\SeoInit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\AdvertisementCreate;
use App\Interfaces\AdvertisementRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    protected $repository,$commentRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdvertisementRepositoryInterface $repository,CommentRepositoryInterface $commentRepo)
    {
        $this->repository = $repository;
        $this->commentRepo = $commentRepo;
    }
    public function all()
    {
        return view('pages.ads');
    }

    public function create()
    {
        return view('pages.ad-create');
    }

    public function insert(AdvertisementCreate $request){
        // dd($request->all());
        $data = $request->all();
        $ad = $this->repository->createAd($data);
        return redirect()->route('frontend.ad.details',['slug' => $ad->slug]);
    }

    public function one($slug,Request $request){
        $ad = $this->repository->firstBySlug($slug);
        $comments = $this->commentRepo->allBy(['parent_id'=>null],['replies'],['*'],['created_at'=>'desc']);
        SeoInit::init($ad->title,$ad->desc,route('frontend.ad.details',['slug'=>$ad->slug]),$ad->created_at->toW3CString(),asset($ad->photo),$ad->tagList);
        return view('pages.ad-details',compact('ad','comments'));
    }

    public function edit($id,Request $request){
        $ad = $this->repository->findById($id);
        if(!$this->checkAuthorized($ad)){
            return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
        }
        return view('pages.ad-edit',compact('ad'));
    }

    public function update($id,Request $request){
        $ad = $this->repository->updateById($id,['status' => 0]);
        if(!$this->checkAuthorized($ad)){
            return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
        }
        return redirect()->route('frontend.dashboard');
    }

    public function delete($id,Request $request){
        $ad = $this->repository->findById($id);
        if(!$this->checkAuthorized($ad)){
            return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
        }
        return view('pages.ad-delete',compact('ad'));
    }

    public function destroy($id,Request $request){
        $ad = $this->repository->updateById($id,['status' => 0],false);
        if(!$this->checkAuthorized($ad)){
            return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
        }
        return redirect()->route('frontend.dashboard');
    }

    public function add_to_fav($id,Request $request){
        $ad = $this->repository->findById($id);
        $ad->userFavoriteList()->save(auth()->guard('user')->user());
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
    }

    public function chat($id,Request $request){
        $ad = $this->repository->findById($id);
        $this->sameUser($ad);
        return view('pages.chat',compact('ad'));
    }

    public function report($id,Request $request){
        $ad = $this->repository->findById($id);
        $ad->reports()->create([
            'comment' => '',
            'reportable_id' => $id,
            'reportable_type' => $this->repository->getModel()->morphName,
            'user_id' => auth()->guard('user')->user()->id
        ]);
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
    }

    public function reportComment($id,Request $request){
        $comment = $this->commentRepo->findById($id);
        $comment->reports()->create([
            'comment' => '',
            'reportable_id' => $id,
            'reportable_type' => $this->commentRepo->getModel()->morphName,
            'user_id' => auth()->guard('user')->user()->id
        ]);
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return redirect()->route('frontend.ad.details',['slug'=>$comment->advertisement->slug]);
    }

    public function add_comment($id,Request $request){
        // dd($request->all());
        $ad = $this->repository->findById($id);
        $ad->userComments()->save(auth()->guard('user')->user(),$request->only(['parent_id','comment']));
        return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
    }

    public function add_rating($id,Request $request){
        $ad = $this->repository->findById($id);
        $data = $request->only(['stars','comment']);
        $data['rated_user_id'] = $ad->user_id;
        $ad->ratedUsers()->save(auth()->guard('user')->user(),$data);
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return redirect()->route('frontend.ad.details',['slug'=>$ad->slug]);
    }

    
    private function checkAuthorized($model){
        if($model->user_id != auth()->guard('user')->user()->id){
            toastr()->error(__('base.error.notAuthorized'), __('base.error.notAuthorized'));
            return false;
        }
        return true;
    }

    private function sameUser($model){
        if($model->user_id == auth()->guard('user')->user()->id){
            toastr()->error(__('base.error.notAuthorized'), __('base.error.notAuthorized'));
            return redirect()->route('frontend.ad.details',['slug'=>$model->slug]);
        }
    }
}
