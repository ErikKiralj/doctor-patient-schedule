<?php

namespace App\Http\Middleware;

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
        if (Auth::guard('admin')->user()==true) {
            return redirect('/admin/show_doc');
        }

        if (Auth::guard('doctor')->user()==true) {
            return redirect('/dlogin');
        }

        if (Auth::guard('web')->user()==true) {
            return redirect('/home');
        }

        return $next($request);
    }
}
