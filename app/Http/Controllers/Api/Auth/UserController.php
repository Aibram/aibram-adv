<?php

namespace App\Http\Controllers\Api\Auth;

use App\Facades\APIResponse;
use App\Http\Requests\Api\ResetPasswordRequest;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $repository;
    
    public function __construct(UserRepositoryInterface $repository){
        parent::__construct();
        $this->repository = $repository;
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        return APIResponse::sendResponse(__('base.password.reset_success'),$this->repository->updateById($this->user->id,$request->validated(),false)); 
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        return APIResponse::sendResponse(__('base.password.reset_success'),$this->repository->updateFullUser($this->user->id,$request->validated())); 
    }

    public function currentUser(Request $request)
    {
        return APIResponse::sendResponse(__('base.success.success'),$this->repository->findById($this->user->id,['city','country'])); 
    }
}
