<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the specified role
        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request);
        }

        // If the user doesn't have the role, redirect or show 403 Forbidden
        return redirect('/');  // Or return abort(403, 'Unauthorized.');
    }
}