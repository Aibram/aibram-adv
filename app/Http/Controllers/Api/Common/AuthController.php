<?php

namespace App\Http\Controllers\Api\Common;

use App\Facades\APIResponse;
use App\Facades\SMSService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Monolog\Handler\FingersCrossed\ActivationStrategyInterface;

class AuthController extends Controller
{
    protected $repository,
              $actRepo;
    
    public function __construct(UserRepositoryInterface $repository,ActivationStrategyInterface $actRepo){
        $this->repository = $repository;
        $this->actRepo = $actRepo;
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
        return APIResponse::successResponse($smsReponse,$resp);   
    }
}
