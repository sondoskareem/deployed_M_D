<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
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
        if(auth()->user()->superAdmin == true){
//            dd(auth()->user()->superAdmin);
            return $next($request);
        }else{
//            dd(auth()->user()->isAdmin);

            return redirect(url('/welcome'));
        }
    }
}
