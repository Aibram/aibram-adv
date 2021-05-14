<?php

namespace App\Interfaces;


interface UserRepositoryInterface extends BaseInterface
{

    public function createFullUser(array $data);

    public function updateFullUser($id,array $data);

}
