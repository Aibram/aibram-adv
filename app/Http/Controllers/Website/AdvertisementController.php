<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function all()
    {
        return view('pages.ads');
    }
}
