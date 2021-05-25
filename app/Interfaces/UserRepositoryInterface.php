<?php

namespace App\Interfaces;


interface UserRepositoryInterface extends BaseInterface
{

    public function createFullUser(array $data);

    public function updateFullUser($id,array $data);

    public function createUserApi(array $data);

    public function sendCode($model,$data);

    public function reSendCode($data);

    public function forceLoginApi($user);

    public function loginByPasswordApi($data);
    
    public function verifyCode($data);

    public function checkCode($data);

    public function forgetPassword($data);

    public function activateUser($data);

    
}
