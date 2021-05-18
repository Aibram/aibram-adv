<?php

namespace App\Http\Controllers\NoAuth;

use App\Http\Controllers\Controller;
use App\Interfaces\BaseInterface;

class BaseController extends Controller
{
    private $generalMsg;
    public function __construct()
    {
        $this->generalMsg = __('base.success.done');
    }
    public function setMsg($message){
        $this->generalMsg = $message;
    }
    public function getMsg(){
        return $this->generalMsg;
    }
    public function formatResponse($data,$status,$message){
        return response()->json([
            'data' => $data,
            'status' => $status,
            'message' => $message
        ]);
    }
}
