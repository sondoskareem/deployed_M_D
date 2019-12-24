<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class IsAdmin extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
//        dd('ddd');
        if(auth()->user()->isAdmin == true  && auth()->user()->superAdmin == false){
//            dd(auth()->user()->isAdmin);
            return $next($request);
        }else{
//            dd(auth()->user()->isAdmin);
//
            return redirect(url('/'));
        }
    }
}
