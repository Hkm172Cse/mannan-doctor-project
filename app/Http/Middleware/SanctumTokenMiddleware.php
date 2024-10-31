<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SanctumTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Check if the request is authenticated using Sanctum
       if (Auth::guard('tradie')->check()) {
            //return response()->json(['message' => 'Unauthorized'], 401);
            return $next($request);
        }
        else if(Auth::guard('store')->check()){
            return $next($request);
        }

        //return $next($request);
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
