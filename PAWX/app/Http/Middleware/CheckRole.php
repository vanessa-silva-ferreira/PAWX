<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
//    public function handle(Request $request, Closure $next, string ...$roles): Response
//    {
//
//        if (!$request->user() || !$request->user()->hasRole($roles)) {
//            abort(403, 'Unauthorized action.');
//        }
//        return $next($request);
//    }
    // string ...roles
    // It allows the middleware to accept any number of role arguments.
    // Provides flexibility in specifying multiple roles for a route without changing the middleware code.

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Check if user is authenticated
        if (!$user) {
            Log::warning('CheckRole: Unauthenticated access attempt', [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
            ]);
            return $this->handleUnauthorized($request);
        }

        $userRole = $user->getRole();

        Log::info('CheckRole: Checking user role', [
            'user_id' => $user->id,
            'email' => $user->email,
            'user_role' => $userRole,
            'required_roles' => $roles,
            'url' => $request->fullUrl(),
        ]);

        // Check if user has the required role
        if (in_array($userRole, $roles)) {
            Log::info('CheckRole: Access granted', [
                'user_id' => $user->id,
                'role' => $userRole,
                'url' => $request->fullUrl(),
            ]);
            return $next($request);
        }

        // If we reach here, the user doesn't have the required role
        Log::warning('CheckRole: Access denied', [
            'user_id' => $user->id,
            'user_role' => $userRole,
            'required_roles' => $roles,
            'url' => $request->fullUrl(),
        ]);

        return $this->handleUnauthorized($request);
    }

    private function handleUnauthorized(Request $request): Response
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        abort(403, 'Unauthorized action.');
    }


}
