<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if (!auth()->user()->belongsToCompany()) {
            return redirect()->route('index'); 
        }

        return $next($request);
    }
}
