<?php


namespace App\Http\Middleware;

use Closure;

class SessionMiddleware
{
    public function handle($request, Closure $next){
        if(!session()->has('userId')){
            return redirect("/");
        }
        return $next($request);
    }
}
