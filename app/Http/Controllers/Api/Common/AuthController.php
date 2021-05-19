<?php

namespace App\Http\Controllers\Api\Common;

use App\Facades\APIResponse;
use App\Http\Controllers\Controller;
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
    /**
     * Create user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string] message
     * @throws \Exception
     */
    public function register(RegisterRequest $request)
    {
        $resp = $this->repository->createUserApi($request->validated());
        list($model,$code,$smsReponse) = $resp;
        return APIResponse::sendResponse($smsReponse,$resp);   
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resendCode(ResendCodeRequest $request)
    {
        $resp = $this->repository->sendCode($request->validated());
        list($code,$smsReponse) = $resp;
        return APIResponse::sendResponse($smsReponse,$resp); 
    }

    public function login(LoginRequest $request)
    {
        return APIResponse::sendResponse(__('base.login.sucess'),$this->repository->loginByPassword($request->validated())); 
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyCode(VerifyCodeRequest $request)
    {
        return APIResponse::sendResponse(__('base.login.verified'),$this->repository->verifyCode($request->validated())); 
    }
}
