<?php

namespace App\Http\Controllers\Api\Common;

use App\Facades\APIResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\CountryRepositoryInterface;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $repository;

    public function __construct(CountryRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function index(Request $request)
    {
        return APIResponse::sendResponse('',$this->repository->allBy($request->all()));
    }
    
    public function view(Request $request,$id)
    {
        return APIResponse::sendResponse('',$this->repository->findById($id));
    }
}
