<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);

            dd('hai udh login');

            if (Auth::user()->role == 1) {
                return redirect()->route('/documents');
            }

            if (Auth::user()->role == 2) {
                return redirect()->route('/account-translator');
            }
        }

        return $next($request);
    }
}
