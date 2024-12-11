<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        $defaultLogPayload = ['ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'params' => $request->all(),
        ];

        if (!$user) {
            Log::warning('CheckRole: Unauthenticated access attempt', $defaultLogPayload);
            return $this->handleUnauthorized($request);
        }

        $userRole = $user->getRole();

        Log::info('CheckRole: Checking user role', array_merge([
            'user_id' => $user->id,
            'email' => $user->email,
            'user_role' => $userRole,
            'required_roles' => $roles,
        ], $defaultLogPayload));

        if (in_array($userRole, $roles)) {
            Log::info('CheckRole: Access granted', [
                'user_id' => $user->id,
                'role' => $userRole,
                'url' => $request->fullUrl(),
            ]);
            return $next($request);
        }

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
