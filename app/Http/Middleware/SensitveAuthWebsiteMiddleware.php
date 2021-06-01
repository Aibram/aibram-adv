<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SensitveAuthWebsiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('action') &&
           $request->session()->has('auth_user') &&
           $request->session()->has('mobile') && 
           $request->session()->has('ext') )
            return $next($request);
        else{
            toastr()->error(__('base.error.notAuthorized'), __('base.error.notAuthorized'));
            return redirect()->route('frontend.home');
        }
    }
}
