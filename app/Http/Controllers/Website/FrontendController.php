<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        // dd(getAds([],null,6)[0]->toArray());
        return view('pages.home');
    }

    public function profile($id,Request $request)
    {
        return view('pages.profile');
    }

    public function dashboard(Request $request)
    {
        return view('pages.dashboard');
    }

    public function categories()
    {
        return view('pages.categories');
    }

    public function about()
    {
        return view('pages.about');
    }
}
