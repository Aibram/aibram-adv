<?php

namespace App\Http\Controllers\NoAuth;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $repository;
    public function __construct(CategoryRepositoryInterface $repository){
        $this->repository = $repository;
        parent::__construct();
    }

    public function getCatList(Request $request)
    {
        try{
            return $this->formatResponse($this->repository->getTreeViewAdmin($request->admin_id,$request->parent_id),200,$this->getMsg());
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return $this->formatResponse([],401,$e->getMessage());
        }
    }
    public function getSingleCatList(Request $request)
    {
        try{
            return $this->formatResponse($this->repository->findByIdAdmin($request->admin_id,$request->id),200,$this->getMsg());
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return $this->formatResponse([],401,$e->getMessage());
        }
    }
    public function insertCat(Request $request)
    {
        $this->setMsg(__('base.success.created'));
        try{
            return $this->formatResponse($this->repository->createCatAdmin($request->admin_id,$request->all()),200,$this->getMsg());
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return $this->formatResponse([],401,$e->getMessage());
        }
    }
    public function updateCat(Request $request)
    {
        $this->setMsg(__('base.success.updated'));
        try{
            return $this->formatResponse($this->repository->updateCategoryAdmin($request->admin_id,$request->all()),200,$this->getMsg());
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return $this->formatResponse([],401,$e->getMessage());
        }
    }
    public function deleteCat(Request $request)
    {
        $this->setMsg(__('base.success.deleted'));
        try{
            return $this->formatResponse($this->repository->deleteCatAdmin($request->admin_id,$request->all()),200,$this->getMsg());
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return $this->formatResponse([],401,$e->getMessage());
        }
    }
}
