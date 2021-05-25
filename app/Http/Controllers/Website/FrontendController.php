<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function categories()
    {
        return view('pages.categories');
    }
}
