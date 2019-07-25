<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1 || Auth::user()->is_superadmin == 1) {
                return $next($request);
            }
            Auth::logout();
        }

        return redirect('/login');
    }
}
