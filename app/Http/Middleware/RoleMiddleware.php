<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            Log::info('User not authenticated');
            return redirect('/'); // Redirect if not authenticated
        }

        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            Log::info('User ' . auth()->user()->email . ' does not have role: ' . $role);
            return redirect('/'); // Redirect if user doesn't have the required role
        }
        return $next($request);
    }
}
