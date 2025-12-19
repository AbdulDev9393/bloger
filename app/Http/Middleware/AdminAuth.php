<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
     
        if (!Auth::check()) {
            return redirect()->route('frontend.index');
        }

        // Optional: Check if user is admin
        // Assuming you have a 'role' column in users table
        if (Auth::user()->role !== 'admin') {
           
            return redirect()->route('frontend.index')->with('error', 'Access denied.');
        }

        return $next($request);
    }


}
