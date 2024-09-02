<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRole = session("user")->role;
        // dd($userRole);

        if ($userRole == "admin") {
            return $next($request);
        } else if ($userRole == "utilisateur") {
            return redirect("/");
        }

    }
}
