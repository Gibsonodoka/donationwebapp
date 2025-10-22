<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // If not logged in, send to login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // If logged in but not admin, show friendly unauthorized view
        if (Auth::user()->role !== 'admin') {
            return response()->view('errors.unauthorized', [], 403);
        }

        // Allow access if user is admin
        return $next($request);
    }
}
