<?php

namespace App\Http\Middleware;

use App\Company;
use Closure;

class CompnayExist
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
        $userID = auth()->user()->id;
        $companies = Company::where('user_id', $userID)->get();

        if(!$companies->count() == 0)  return redirect('/add/employees');

            return $next($request);
    }
}
