<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseAbstract implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
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
}
