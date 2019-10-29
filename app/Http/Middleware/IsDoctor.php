<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsDoctor
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
        if (Auth::guard('doctor')->user()==true){
            return $next($request);
        }

        return redirect('/dlogin');
    }
}
