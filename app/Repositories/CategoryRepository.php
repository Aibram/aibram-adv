<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Admin;
use App\Models\Category;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CategoryRepository extends BaseAbstract implements CategoryRepositoryInterface
{
    
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getTreeViewAdmin($adminId,$parent_id)
    {
        $admin = Admin::find($adminId);
        if(!$admin->hasPermissionTo('categories.index','admin') && !$admin->hasRole('Super Admin','admin')){
            throw new UnauthorizedException(401,__('base.notAuthorized'));
        }
        return $this->allBy(['parent_id' => $parent_id],[],['*'],['ordering' => 'ASC'])->map->formatTreeJS();
    }

    public function updateCategoryAdmin($adminId,$data){
        $admin = Admin::find($adminId);
        if(!$admin->hasPermissionTo('categories.edit','admin') && !$admin->hasRole('Super Admin','admin')){
            throw new UnauthorizedException(401,__('base.notAuthorized'));
        }
        $id = $data['id'];
        unset($data['id']);
        $data['desc'] = !empty($data['desc']) ? $data['desc'] : '';
        $user = $this->updateById($id,$data,false);
        $this->CheckSingleMediaAndAssign($data,$user,'image',$this->model->mainImageCollection,true);
    }

    public function findByIdAdmin($adminId,$id){
        $admin = Admin::find($adminId);
        if(!$admin->hasPermissionTo('categories.index','admin') && !$admin->hasRole('Super Admin','admin')){
            throw new UnauthorizedException(401,__('base.notAuthorized'));
        }
        return $this->findById($id);
    }
    public function createCatAdmin($adminId,$data){
        $admin = Admin::find($adminId);
        if(!$admin->hasPermissionTo('categories.create','admin') && !$admin->hasRole('Super Admin','admin')){
            throw new UnauthorizedException(401,__('base.notAuthorized'));
        }
        if($data['parent_id'] == 'null'){
            $data['parent_id'] =null;
        }
        $data['parent_id'] = $data['parent_id'] == 'null' ? null : $data['parent_id'];
        $data['desc'] = !empty($data['desc']) ? $data['desc'] : '';
        $data['icon'] = !empty($data['icon']) ? $data['icon'] : 'fas fa-bars';
        return $this->create($data);
    }
    public function deleteCatAdmin($adminId,$data){
        $admin = Admin::find($adminId);
        if(!$admin->hasPermissionTo('categories.destroy','admin') && !$admin->hasRole('Super Admin','admin')){
            throw new UnauthorizedException(401,__('base.notAuthorized'));
        }
        return $this->deleteById($data['id']);
    }

}
