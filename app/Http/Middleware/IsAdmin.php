<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!auth()->user() || !auth()->user()->is_admin) {
        //     // If the user is not authenticated or not an admin, redirect or abort
        //     return redirect()->route('login')->with('error', 'You do not have admin access.');
        //     // Alternatively, you could use abort(403) to deny access
        // }
        // if (!auth()->check()) {
        //     // If the user is not authenticated redirect or abort
        //     return redirect()->route('login')->with('error', 'You do not have access.');

            // Alternatively, you could use abort(403) to deny access
        // }
        if (!auth()->user()->is_admin) {
            // If the user is not an admin redirect or abort
                return redirect()->route('lists')->with('error', 'You do not have admin access.');
            
        }


        return $next($request);
    }
}

