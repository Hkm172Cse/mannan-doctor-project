<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DoctorAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('doctor')->check()) {
            \Log::info('Doctor is authenticated on route: ' . $request->path());
            return $next($request);
        }else{
            \Log::warning('Doctor authentication failed on route: ' . $request->path());
            return redirect()->route('doc.login');
        }
    }
}
