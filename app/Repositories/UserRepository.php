<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Exceptions\AuthenticationException;
use App\Facades\CodeSender;
use App\Facades\RandomCode;
use App\Interfaces\UserRepositoryInterface;
use App\Models\ActivationCode;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseAbstract implements UserRepositoryInterface
{
    protected $actModel;
    public function __construct(User $model, ActivationCode $actModel)
    {
        parent::__construct($model);
        $this->actModel = $actModel;
    }

    public function createFullUser(array $data)
    {
        $this->checkRequestCheckBoxExists($data, 'activated');
        $model = $this->create($data);
        $this->CheckSingleMediaAndAssign($data, $model, 'photo', $this->model->mainImageCollection);
        return $model;
    }

    public function updateFullUser($id, array $data)
    {
        // dd($data);
        // $this->checkRequestCheckBoxExists($data,'activated');
        $user = $this->updateById($id, $data);
        $this->CheckSingleMediaAndAssign($data, $user, 'photo', $this->model->mainImageCollection, true);
        return $user;
    }

    public function createUserApi(array $data)
    {
        $data['status'] = 1;
        $model = $this->create($data);
        $codeResp = $this->sendCode($model, $data);
        $this->CheckSingleMediaAndAssign($data, $model, 'photo', $this->model->mainImageCollection);
        return [
            'user' => $model,
            'code' => $codeResp['code'],
            'smsReponse' => $codeResp['smsReponse']
        ];
    }
    public function sendCode($model, $data)
    {
        $code = RandomCode::getCode(6);
        $smsReponse = CodeSender::sendMessage($data['provider'],$data['mobile'],'Aibram', __('base.user.code', ['code' => $code]));
        $model->codes()->where(['finished' => 0])->update([
            'finished' => 1
        ]);
        $model->codes()->create([
            'code' => $code
        ]);
        toastr()->success(__('frontend.verify_code.code'), $code);
        return [
            'code' => $code,
            'smsReponse' => $smsReponse,
            'model' => $model
        ];
    }
    public function reSendCode($data)
    {
        $user = $this->getFirstBy(['mobile' => $data['mobile'],'ext'=>$data['ext']]);
        return $this->sendCode($user, $data);
    }

    public function forceLoginApi($user)
    {
        Auth::guard('user-api')->setUser($user);
        return [
            'user' => Auth::guard('user-api')->user(),
            'token' => Auth::guard('user-api')->user()->createToken('MyApp', ['user-api'])->accessToken
        ];
    }
    public function loginByPasswordApi($data)
    {
        $user = $this->getFirstBy(['mobile' => $data['mobile'], 'activated' => 1, 'status' => 1]);
        if(!$user || !$this->passwordCheck($user->password, $data['password'])) {
            throw new AuthenticationException(__('base.error.notAuth'), __('base.error.mobile_or_pass'), "");
        }
        return $this->forceLoginApi($user);
    }
    public function checkCode($data)
    {
        $user = $this->findById($data['id']);
        $actRecord = $user->codes()->where(['code' => $data['code'], 'finished' => 0])->latest()->first();
        if (!$actRecord)
            throw new ModelNotFoundException();
        $user->codes()->where(['finished' => 0])->update([
            'finished' => 1
        ]);
        return $user;
    }

    public function activateUser($data)
    {
        $user = $this->checkCode($data);
        $this->updateById($user->id, [
            'activated' => 1,
            'activated_at' => now()
        ],false);
        return $user;
    }

    public function verifyCode($data)
    {
        $user = $this->activateUser($data);
        return $this->forceLoginApi($user);
    }

    public function forgetPassword($data)
    {
        $user = $this->checkCode($data);
        $this->updateById($user->id, [
            'password' => $data['password']
        ],false);
        return $user;
    }
}
