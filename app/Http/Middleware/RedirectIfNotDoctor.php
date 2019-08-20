<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotDoctor
{
    /*
     _ Handle an incoming request.
     _
     _ @param  \Illuminate\Http\Request  $request
     _ @param  \Closure  $next
     _ @return mixed
    */
    public function handle($request, Closure $next, $guard="doctor")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('sessions.doc_create'));
        }
        return $next($request);
    }
}
