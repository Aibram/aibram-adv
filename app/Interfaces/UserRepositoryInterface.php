<?php

namespace App\Interfaces;


interface UserRepositoryInterface extends BaseInterface
{

    public function createFullUser(array $data);

    public function updateFullUser($id,array $data);

    public function createUserApi(array $data);

    public function sendCode($data);

    public function forceLogin($user);

    public function loginByPassword($data);
    
    public function verifyCode($data);
    
}
