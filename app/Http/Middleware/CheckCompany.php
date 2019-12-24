<?php

namespace App\Http\Middleware;

use Closure;

class CheckCompany
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
//        dd(auth()->user()->company);
        if(auth()->user()->company == null)
            return redirect('/add/company');
        return $next($request);
    }
}
