<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class loginNhatuyendungMiddleware
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
     if(Auth::guard('nhatuyendung')->check())
     {
         
        return $next($request);
    }
    else{
        return  redirect()->back();
    }
}
}
