<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Facades\RandomCode;
use App\Facades\SMSService;
use App\Interfaces\UserRepositoryInterface;
use App\Models\ActivationCode;
use App\Models\User;

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
        $user = $this->attachMedia($data['photo'],$model,$this->model->mainImageCollection);
        return $user;
    }

    public function updateFullUser($id,array $data){
        // $this->checkRequestCheckBoxExists($data,'activated');
        $user = $this->updateById($id,$data);
        if(isset($data['photo'])){
            $user = $this->detachMedia($user,null,$this->model->mainImageCollection);
            $user = $this->attachMedia($data['photo'],$user,$this->model->mainImageCollection);
        }
        return $user;
    }

    public function createUserApi(array $data){
        $model = $this->create($data);
        $code=RandomCode::getCode(4);
        $smsReponse=SMSService::sendMessage($data['mobile'],__('base.user.code'),'Aibram');
        $this->actModel->create([
            'code' => $code
        ]);
        if(isset($data['photo'])){
            $model = $this->attachMedia($data['photo'],$model,$this->model->mainImageCollection);
        }
        
        return [
            'model' => $model,
            'code' => $code,
            'smsReponse' => $smsReponse
        ];
    }

}
