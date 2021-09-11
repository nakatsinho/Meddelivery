<?php

namespace Meddelivery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        
        if(Auth::check() && Auth::user()->admin()== 1){

            return $next($request);
        }
        return redirect('home')->with('error','You don’t have admin access');
    }
}
// if(auth()->user()->is_admin == 1){
//     return $next($request);
//     }
//     return redirect(‘home’)->with(‘error’,’You don't have admin access’);
