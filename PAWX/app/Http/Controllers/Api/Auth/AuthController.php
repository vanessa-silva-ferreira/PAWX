<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Laravel\Passport\Client;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            try {
                Log::info('User authenticated successfully', ['user_id' => $user->id]);

                $client = $this->getPasswordGrantClient();
                Log::info('Password grant client retrieved', ['client_id' => $client->id]);

                $token = $this->createToken($user);
                Log::info('Token created successfully', ['user_id' => $user->id]);

                $roleRedirect = $this->getRoleBasedRedirect($user->getRole());

                return response()->json([
                    'user' => $user,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'role_redirect' => $roleRedirect
                ], 200);
            } catch (\Exception $e) {
                Log::error('Token generation failed', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                return response()->json(['error' => 'Unable to generate token: ' . $e->getMessage()], 500);
            }
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    private function getPasswordGrantClient()
    {
        $client = Client::where('password_client', 1)->first();

        if (!$client) {
            Log::error('Password grant client not found in database');
            throw new \Exception('Password grant client not found');
        }

        return $client;
    }

    private function createToken($user)
    {
        try {
            $token = $user->createToken('API Token', ['*']);
            return $token->accessToken;
        } catch (\Exception $e) {
            Log::error('Failed to create token', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function refresh(Request $request)
    {
        $request->validate([
            'refresh_token' => 'required'
        ]);

        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);

        try {
            $token = $tokenRepository->findValidToken($request->user());

            if (!$token) {
                throw new \Exception('No valid token found');
            }

            $refreshToken = $refreshTokenRepository->findByToken($request->refresh_token);

            if (!$refreshToken) {
                throw new \Exception('No valid refresh token found');
            }

            $refreshTokenRepository->revokeRefreshToken($refreshToken->id);
            $tokenRepository->revokeAccessToken($token->id);

            $newToken = $request->user()->createToken('API Token')->accessToken;

            return response()->json([
                'access_token' => $newToken,
                'token_type' => 'Bearer',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Unable to refresh token',
                'message' => $e->getMessage()
            ], 401);
        }
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    private function getRoleBasedRedirect($role)
    {
        switch ($role) {
            case 'admin':
                return 'admin/';
            case 'employee':
                return 'employee/';
            case 'client':
                return 'client/';
            default:
                return '/';
        }
    }


}
