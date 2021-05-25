<?php

namespace App\Http\Controllers\Api\Common;

use App\Facades\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\ResendCodeRequest;
use App\Http\Requests\Api\VerifyCodeRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $repository,
              $actRepo;
    
    public function __construct(UserRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function register(RegisterRequest $request)
    {
        $resp = $this->repository->createUserApi($request->validated());
        return APIResponse::sendResponse($resp['smsReponse'],$resp);   
    }

    public function resendCode(ResendCodeRequest $request)
    {
        $resp = $this->repository->reSendCode($request->validated());
        return APIResponse::sendResponse($resp['smsReponse'],$resp); 
    }

    public function login(LoginRequest $request)
    {
        return APIResponse::sendResponse(__('base.login.sucess'),$this->repository->loginByPasswordApi($request->validated())); 
    }

    public function verifyCode(VerifyCodeRequest $request)
    {
        return APIResponse::sendResponse(__('base.login.verified'),$this->repository->verifyCode($request->validated())); 
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        return APIResponse::sendResponse(__('base.password.reset_success'),$this->repository->forgetPassword($request->validated())); 
    }

    public function getUserByProperty(Request $request)
    {
        return APIResponse::sendResponse(__('base.success.success'),$this->repository->getFirstBy($request->all(),['*'],['city','country'])); 
    }
    
}
