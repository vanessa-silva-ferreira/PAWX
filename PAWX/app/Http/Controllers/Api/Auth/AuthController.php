<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            try {
                $sessionToken = Str::random(40);

                session([$sessionToken => [
                    'user_id' => $user->id,
                    'role' => $user->getRole(),
                    'email' => $user->email
                ]]);

                $cookie = Cookie::make('custom_session', $sessionToken, 120); // 120 minutos de duração

                $roleRedirect = $this->getRoleBasedRedirect($user->getRole());

                return response()->json([
                    'message' => 'Login successful',
                    'role_redirect' => $roleRedirect
                ], 200)->withCookie($cookie);
            } catch (\Exception $e) {
                \Log::error('Session creation failed', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                return response()->json(['error' => 'Unable to create session'], 500);
            }
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    private function getRoleBasedRedirect($role)
    {
        switch ($role) {
            case 'admin':
                return 'admin/dashboard';
            case 'employee':
                return 'employee/dashboard';
            case 'client':
                return 'client/dashboard';
            default:
                return '/home';
        }
    }

}
