<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Web\UserManagementController;

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
                    'role_redirect' => $roleRedirect,
                    'token' => $sessionToken,
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

//    public function register(Request $request)
//    {
//        try {
//            $validated = $request->validate([
//                'name' => 'required|string|max:255',
//                'email' => 'required|string|email|max:255|unique:users',
//                'password' => 'required|string|min:8',
//                // 'role' => 'required|in:admin,employee,client',
//            ]);
//
//            $user = User::create([
//                'name' => $validated['name'],
//                'email' => $validated['email'],
//                'password' => Hash::make($validated['password']),
//                'role' => 'client', // Default role, adjust as needed
//                // 'role' => $validated['role'], // Uncomment if you want to allow role selection during registration
//            ]);
//
//            Auth::login($user);
//
//            $sessionToken = Str::random(40);
//
//            session([$sessionToken => [
//                'user_id' => $user->id,
//                'role' => $user->getRole(),
//                'email' => $user->email
//            ]]);
//
//            $cookie = Cookie::make('custom_session', $sessionToken, 120); // 120 minutes duration
//
//            $roleRedirect = $this->getRoleBasedRedirect($user->getRole());
//
//            return response()->json([
//                'message' => 'User registered successfully',
//                'user' => $user,
//                'role_redirect' => $roleRedirect
//            ], 201)->withCookie($cookie);
//
//        } catch (ValidationException $e) {
//            return response()->json(['errors' => $e->errors()], 422);
//        } catch (\Exception $e) {
//            \Log::error('Registration failed: ' . $e->getMessage());
//            return response()->json(['error' => 'Registration failed. Please try again.'], 500);
//        }
//    }
    public function register(StoreUserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $type = $validatedData['type'] ?? 'client';

            if (!in_array($type, ['admin', 'employee', 'client'])) {
                return response()->json(['error' => 'Invalid user type'], 422);
            }

            $userManagement = new UserManagementController();
            $user = $userManagement->createUser($request, $type);

            if (!$user) {
                return response()->json(['error' => 'Failed to create user'], 500);
            }

            Auth::login($user);

            $sessionToken = Str::random(40);

            session([$sessionToken => [
                'user_id' => $user->id,
                'role' => $user->getRole(),
                'email' => $user->email
            ]]);

            $cookie = Cookie::make('custom_session', $sessionToken, 120);

            $roleRedirect = $this->getRoleBasedRedirect($user->getRole());

            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
                'role_redirect' => $roleRedirect
            ], 201)->withCookie($cookie);

        } catch (\Exception $e) {
            \Log::error('Registration failed: ' . $e->getMessage());
            return response()->json(['error' => 'Registration failed. Please try again.'], 500);
        }
    }


    public function logout(Request $request)
    {
        $sessionToken = $request->cookie('custom_session');

        if ($sessionToken) {
            session()->forget($sessionToken);
        }

        Auth::logout();

        $cookie = Cookie::forget('custom_session');

        return response()->json(['message' => 'Logged out successfully'])->withCookie($cookie);
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
