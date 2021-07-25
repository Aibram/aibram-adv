<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;

class AdminRepository extends BaseAbstract implements AdminRepositoryInterface
{
    
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }

    public function createAdmin(array $data){
        $admin = $this->create($data);
        if(array_key_exists('super',$data)){
            $admin->assignRole('Super Admin');
        }
        else if(array_key_exists('permissions',$data) && count($data['permissions']) >0){
            $admin->givePermissionTo(array_keys($data['permissions']));
        }
        return $admin;
    }
    
    public function updateAdmin($id,array $data){
        if(! @$data['password']){
            unset($data['password']);
        }
        $admin = $this->updateById($id,$data);
        if($admin->hasRole('Super Admin') && !array_key_exists('super',$data)){
            $admin->removeRole('Super Admin');
        }
        else if(!$admin->hasRole('Super Admin') && array_key_exists('super',$data)){
            $admin->assignRole('Super Admin');
        }
        
        if(array_key_exists('permissions',$data) && count($data['permissions']) >0){
            $admin->syncPermissions(array_keys($data['permissions']));
        }
        $admin->refresh();
        return $admin;
    }

    public function getFullAdmin($id){
        $model = $this->findById($id);
        return [
            'model' => $model,
            'super' => $model->hasRole('Super Admin')
        ];
    }



    
}
