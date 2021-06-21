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
        if (auth()->guard('user')->check()) {
            $expiresAt = Carbon::now()->addMinutes(1); // keep online for 1 min
            Cache::put('user-is-online-' . auth()->guard('user')->user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
