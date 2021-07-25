<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // dump(checkLoggedIn('admin'));
        // dd(Route::currentRouteName());
        // dd(checkLoggedIn('admin'));
        foreach ($guards as $guard) {
            if($guard == 'admin' && Auth::guard("admin")->check()){
                return redirect(RouteServiceProvider::ADMINHOME);
            }
            // if($guard == 'user' && Auth::guard("user")->check()){
            //     return redirect(RouteServiceProvider::HOME);
            // }
        }
        return $next($request);
    }
}
