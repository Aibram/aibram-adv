<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Requests\Admin\AdminCreate;
use App\Http\Requests\Admin\AdminUpdate;
use App\Http\Requests\Admin\AdminUpdatePassword as AdminAdminUpdatePassword;
use App\Http\Requests\Admin\AdminUpdateProfile as AdminAdminUpdateProfile;
use App\Http\Requests\AdminUpdatePassword;
use App\Http\Requests\AdminUpdateProfile;
use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

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
        // dd(Auth::guard('admin')->user());
        $usersChart = 5;
        $delegatorChart = 5;
        $userCount = 5;
        $delegatorCount = 5;
        $delegationCount = 5;
        $adCount = 5;
        return view($this->fullView.'.dashboard',compact('usersChart','delegatorChart','userCount','delegatorCount','delegationCount','adCount'));
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
        $this->repository->createAdmin($request->all());
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
        $this->repository->updateAdmin($id,$request->all());
        return redirect()->route($this->route.'.index');
    }
}
