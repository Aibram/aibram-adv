<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function successResponse($message="",$data=[],$status=200){
        return response()->json([
            'message' => $message,
            'data'=>$data,
            'status' => $status,
            'success'=>true
        ]);
    }
    public function failureResponse($message="",$data=[],$status=401){
        return response()->json([
            'message' => $message,
            'status' => $status,
            'errors'=>$data,
        ]);
    }
}
