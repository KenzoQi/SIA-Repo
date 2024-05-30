<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            return redirect('login'); // Redirect to login if not authenticated
        }

        // Check if the user has the required role
        if ($role && $request->user()->usertype !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
