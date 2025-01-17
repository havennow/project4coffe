<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()) {
            return redirect()->route('auth.login')->with('success', trans('gitscrum.App-authentication-is-required'));
        }

        return $next($request);
    }
}
