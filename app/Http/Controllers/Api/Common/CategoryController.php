<?php

namespace App\Http\Controllers\Api\Common;

use App\Facades\APIResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function index(Request $request)
    {
        return APIResponse::successResponse('',$this->repository->allBy($request->all(),['children'],['*'],['ordering'=>'asc']));
    }
    
    public function view(Request $request,$id)
    {
        return APIResponse::successResponse('',$this->repository->findById($id,['children']));
    }
}
