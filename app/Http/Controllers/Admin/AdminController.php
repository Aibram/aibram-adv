<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Requests\Admin\AdminCreate;
use App\Http\Requests\Admin\AdminUpdate;
use App\Http\Requests\Admin\AdminUpdatePassword as AdminAdminUpdatePassword;
use App\Http\Requests\Admin\AdminUpdateProfile as AdminAdminUpdateProfile;
use App\Interfaces\AdminRepositoryInterface;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    protected
        $viewPart       = 'admins',
        $route          = 'admin.admins',
        $storeRequest   = AdminCreate::class,
        $updateRequest  = AdminUpdate::class;
    public function __construct(AdminRepositoryInterface $repository){
        parent::__construct($repository,AdminDataTable::class);
    }

    public function dashboard(Request $request)
    {
        $usersCount = getCount($request->all(),User::active(1));
        $categoriesCount = getCount($request->all(),Category::active(1));
        $citiesCount = getCount($request->all(),City::active(1));
        $adsCount = getCount($request->all(),Advertisement::active(1));
        return view($this->fullView.'.dashboard',compact('usersCount','categoriesCount','citiesCount','adsCount'));
    }

    public function showProfile(Request $request)
    {
        return view($this->fullView.'.profile')
        ->with('data',$this->repository->findById(Auth('admin')->id()));
        return view('admin::pages.profile');
    }

    public function profile(AdminAdminUpdateProfile $request)
    {
        $this->repository->updateById(Auth::guard('admin')->id(),$request->validated());
        return redirect()->route($this->route.'.profile.get');
    }

    public function changePassword(AdminAdminUpdatePassword $request)
    {
        $this->repository->updateById(Auth::guard('admin')->id(),$request->validated());
        return redirect()->route($this->route.'.profile.get');
    }

    public function store()
    {
        $request = app($this->storeRequest);
        $model = $this->repository->createAdmin($request->all());
        logAction($this->me,$model,['model'=>$this->repository->getTable(),'operation'=>'store']);
        return redirect()->route($this->route.'.index');
    }

    public function edit($id)
    {
        $resp = $this->repository->getFullAdmin($id);
        return view($this->fullView.'.update')
        ->with('data',$resp['model'])
        ->with('super',$resp['super']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = app($this->updateRequest);
        $model = $this->repository->updateAdmin($id,$request->all());
        logAction($this->me,$model,['model'=>$this->repository->getTable(),'operation'=>'update']);
        return redirect()->route($this->route.'.index');
    }
}
