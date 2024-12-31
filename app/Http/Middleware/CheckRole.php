<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Check if user is authenticated and has one of the required roles
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect or return error if role does not match
        abort(403, 'Unauthorized action.');
    }
}
