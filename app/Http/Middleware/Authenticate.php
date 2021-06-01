<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Exceptions\MissingScopeException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->is('api/*')) {
            
            if (!Auth::Guard('admin')->check() && Route::is('admin.*')) {
                return route('admin.login');
            }
            return route('frontend.login');
        }
        else{
            throw new AuthenticationException(__('base.error.notAuth'),__('base.error.unauth'),403);
        }
    }
}
