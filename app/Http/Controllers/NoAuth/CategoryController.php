<?php

namespace App\Http\Controllers\NoAuth;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repository;
    public function __construct(CategoryRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function getCatList(Request $request)
    {
        return response()->json($this->repository->getTreeView($request->parent_id));
    }
    public function getSingleCatList(Request $request)
    {
        return response()->json($this->repository->findById($request->id));
    }
    public function insertCat(Request $request)
    {
        return response()->json($this->repository->create($request->all()));
    }
    public function updateCat(Request $request)
    {
        return response()->json($this->repository->getTreeView($request->parent_id));
    }
}
