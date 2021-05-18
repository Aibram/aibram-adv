<?php

namespace App\Facades\Accessors;


class APIResponse
{
    public function successResponse($message="",$data=[],$status=200){
        return response()->json([
            'message' => $message,
            'data'=>$data,
            'success'=>true
        ], $status);
    }
    public function failureResponse($message="",$data=[],$status=401){
        return response()->json([
            'message' => $message,
            'errors'=>$data,
        ], $status);
    }
}