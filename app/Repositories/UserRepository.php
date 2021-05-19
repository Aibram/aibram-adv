<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Exceptions\AuthenticationException;
use App\Facades\RandomCode;
use App\Facades\SMSService;
use App\Interfaces\UserRepositoryInterface;
use App\Models\ActivationCode;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseAbstract implements UserRepositoryInterface
{
    protected $actModel;
    public function __construct(User $model,ActivationCode $actModel)
    {
        parent::__construct($model);
        $this->actModel = $actModel;
    }

    public function createFullUser(array $data){
        $this->checkRequestCheckBoxExists($data,'activated');
        $model = $this->create($data);
        $this->CheckSingleMediaAndAssign($data,$model,'photo',$this->model->mainImageCollection);
        return $model;
    }

    public function updateFullUser($id,array $data){
        // $this->checkRequestCheckBoxExists($data,'activated');
        $user = $this->updateById($id,$data);
        $this->CheckSingleMediaAndAssign($data,$user,'photo',$this->model->mainImageCollection,true);
        return $user;
    }

    public function createUserApi(array $data){
        $model = $this->create($data);
        list($code,$smsReponse) = $this->sendCode($data);
        $this->actModel->create([
            'code' => $code
        ]);
        $this->CheckSingleMediaAndAssign($data,$model,'photo',$this->model->mainImageCollection);
        return [
            'model' => $model,
            'code' => $code,
            'smsReponse' => $smsReponse
        ];
    }
    public function sendCode($data){
        $code=RandomCode::getCode(4);
        $smsReponse=SMSService::sendMessage($data['mobile'],__('base.user.code'),'Aibram');
        return [
            'code' => $code,
            'smsReponse' => $smsReponse
        ];
    }
    public function forceLogin($user){
        Auth::guard('user-api')->login($user);
        return [
            'user' => Auth::guard('user-api')->user(),
            'token' => Auth::guard('user-api')->user()->createToken('MyApp',['user-api'])->accessToken
        ];
    }
    public function loginByPassword($data){
        if(Auth::guard('user-api')->attempt(['mobile' => $data['mobile'], 'password' => $data['password'],'activated'=>1,'status'=>1])){
            return [
                'user' => Auth::guard('user-api')->user(),
                'token' => Auth::guard('user-api')->user()->createToken('MyApp',['user-api'])->accessToken
            ];
        }else{ 
            throw new AuthenticationException(__('base.error.notAuth'),__('base.error.mobile_or_pass'),"");
        }
    }

    public function activateUser($data){
        $user = $this->getFirstBy(['mobile'=>$data['mobile']]);
        $actRecord = $this->actModel->where(['user_id'=>$user->id,'finished'=>0])->latest()->first();
        if(!$actRecord)
            throw new ModelNotFoundException();
        $this->actModel->where(['user_id'=>$user->id,'finished'=>0])->update([
            'finished' => 1
        ]);
        $user->update([
            'activated' => 1,
            'activated_at' => now()
        ]);
        return $user;
    }

    public function verifyCode($data){
        $user = $this->activateUser($data);
        return $this->forceLogin($user);
    }
    
}
