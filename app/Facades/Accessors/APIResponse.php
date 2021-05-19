<?php

namespace App\Facades\Accessors;


class APIResponse
{
    public function sendResponse($message="",$data=[],$status=200){
        return response()->json([
            'message' => $message,
            'data'=>$data,
            'status'=>$status
        ]);
    }
}