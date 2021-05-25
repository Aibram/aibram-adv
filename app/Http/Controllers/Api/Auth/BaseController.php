<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected $user;

    public function __construct(){
        $this->user = Auth::guard('user-api')->user();
    }
}
