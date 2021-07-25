<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuspendedUserMiddleware
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
        if(currUser('user')->status==1)
            return $next($request);
        else{
            toastr()->error(__('base.error.notAuthorized'), __('base.error.notAuthorized'));
            return redirect()->route('frontend.home');
        }
    }
}
