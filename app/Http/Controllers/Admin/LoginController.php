<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLogin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest:admin')->except(['logout']);
    }

    public function showLoginForm()
    {
        return view('admin::layout.login');
    }

    public function login(AdminLogin $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password, 'status' => 1];
        if(Auth::guard('admin')->attempt($credentials,$request->filled('remember'))){
            return redirect()->route('admin.home');
        }
        toastr()->error(__('base.error.notLoggedInDesc'), __('base.error.notLoggedIn'));
        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
