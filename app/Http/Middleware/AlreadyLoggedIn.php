<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
        {
            if (session()->has('AlreadyLoggedIn')) {
            
                // dd(session()->has('AlreadyLoggedIn')) ;
                return $next($request);
            } else {
                return redirect("/login");
            }
        }
}
