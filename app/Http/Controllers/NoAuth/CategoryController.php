<?php

namespace App\Http\Controllers\NoAuth;

use App\Facades\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryUpdate;
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
            return APIResponse::sendResponse($this->getMsg(),$this->repository->getTreeViewAdmin($request->admin_id,$request->parent_id));
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
    }
    public function getSingleCatList(Request $request)
    {
        try{
            return APIResponse::sendResponse($this->getMsg(),$this->repository->findByIdAdmin($request->admin_id,$request->id));
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
    }
    public function insertCat(Request $request)
    {
        $this->setMsg(__('base.success.created'));
        try{
            return APIResponse::sendResponse($this->getMsg(),$this->repository->createCatAdmin($request->admin_id,$request->all()));
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
    }
    public function updateCat(CategoryUpdate $request)
    {
        $this->setMsg(__('base.success.updated'));
        try{
            return APIResponse::sendResponse($this->getMsg(),$this->repository->updateCategoryAdmin($request->admin_id,$request->all()));
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
    }
    public function deleteCat(Request $request)
    {
        $this->setMsg(__('base.success.deleted'));
        try{
            return APIResponse::sendResponse($this->getMsg(),$this->repository->deleteCatAdmin($request->admin_id,$request->all()));
        }
        catch(\Spatie\Permission\Exceptions\UnauthorizedException $e){
            return APIResponse::sendResponse($e->getMessage(),$e->getMessage(),401);
        }
    }
}
