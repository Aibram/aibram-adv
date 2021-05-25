<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ChangePasswordRequest;
use App\Http\Requests\Website\CheckCodeRequest;
use App\Http\Requests\Website\ForgetPasswordRequest;
use App\Http\Requests\Website\RegisterRequest;
use App\Http\Requests\Website\UserLoginRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->middleware('guest:user')->except(['logout']);
        $this->repository = $repository;
    }

    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function showForgetPasswordForm()
    {
        return view('pages.forget-password');
    }

    public function checkCodeForm()
    {
        return view('pages.check-code');
    }

    public function reInitPasswordForm()
    {
        return view('pages.change-password');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = ['mobile' => $request->mobile,'ext' => $request->ext, 'password' => $request->password, 'status' => 1,'activated' => 1];
        // dd($credentials);
        if(Auth::guard('user')->attempt($credentials,$request->filled('remember'))){
            return redirect()->route('frontend.home');
        }
        toastr()->error(__('base.error.notLoggedInDesc'), __('base.error.notLoggedIn'));
        return back();
    }

    public function register(RegisterRequest $request)
    {
        $resp = $this->repository->createUserApi($request->all());
        $request->session()->put('auth_user', $resp['user']->id);
        $request->session()->put('mobile', $request->mobile);
        $request->session()->put('ext', $request->ext);
        $request->session()->put('action', 'home');
        return redirect()->route('frontend.checkCode');
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $resp = $this->repository->reSendCode($request->all());
        $request->session()->put('auth_user', $resp['model']->id);
        $request->session()->put('mobile', $request->mobile);
        $request->session()->put('ext', $request->ext);
        $request->session()->put('action', 'reInitPassword');
        return redirect()->route('frontend.checkCode');
    }

    public function reInitPassword(ChangePasswordRequest $request)
    {
        $id = $request->session()->get('auth_user');
        $this->repository->updateById($id, [
            'password' => $request->get('password')
        ],false);
        toastr()->success(__('frontend.change_password.success'),__('frontend.change_password.success') );
        $request->session()->forget(['action', 'auth_user','mobile','ext']);
        return redirect()->route('frontend.login');
    }

    public function checkCode(CheckCodeRequest $request)
    {
        $action = $request->session()->get('action');
        $id = $request->session()->get('auth_user');
        $user = $this->repository->activateUser(['id'=> $id , 'code' => $request->code]);
        if($action == "home"){
            Auth::guard('user')->login($user);
            $request->session()->forget(['action', 'auth_user','mobile','ext']);
        }
        return redirect()->route('frontend.'.$action);
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        return redirect()->route('frontend.home');
    }
}
