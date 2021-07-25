<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Cach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OnlineMiddleware
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
        if (checkLoggedIn('user')) {
            $expiresAt = Carbon::now()->addMinutes(config('app.online_mins')); // keep online for 3 min
            Cache::put('user-is-online-' . currUser('user')->id, true, $expiresAt);
        }
        return $next($request);
    }
}
