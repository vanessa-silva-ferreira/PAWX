<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionToken = $request->cookie('custom_session');

        if (!$sessionToken || !session()->has($sessionToken)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userData = session($sessionToken);
        $request->merge(['user_data' => $userData]);

        return $next($request);
    }
}
