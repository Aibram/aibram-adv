<?php

namespace App\Interfaces;


interface CategoryRepositoryInterface  extends BaseInterface
{
    public function getTreeViewAdmin($adminId,$parent_id);

    public function findByIdAdmin($adminId,$id);
    
    public function createCatAdmin($adminId,$data);
    
    public function updateCategoryAdmin($adminId,$data);
    
    public function deleteCatAdmin($adminId,$data);

}
