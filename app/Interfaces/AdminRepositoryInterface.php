<?php

namespace App\Interfaces;


interface AdminRepositoryInterface  extends BaseInterface
{
    public function createAdmin(array $data);

    public function updateAdmin($id,array $data);

    public function getFullAdmin($id);
}
