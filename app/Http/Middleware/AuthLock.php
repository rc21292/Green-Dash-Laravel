<?php

namespace App\Http\Middleware;

use Closure;

class AuthLock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->user()->getLockoutStatus() == 1) {
            return response()->view('auth.locked');
        }

        return $next($request);
    }
}