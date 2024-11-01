<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\Client;

class AuthController extends Controller
{
//    protected $client;
//    public function __construct()
//    {
//        $this->client = Client::where('password_client', 1)->first();
//    }
//    public function register(Request $request)
//    {
//        try {
//            $request->validate([
//                'name' => 'required|string|max:255',
//                'email' => 'required|string|email|max:255|unique:users',
//                'password' => 'required|string|min:8',
//            ]);
//
//            $user = User::create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//            ]);
//
//            return $this->getTokenAndRefreshToken($user->email, $request->password);
//
//        } catch (ValidationException $e) {
//            return response()->json(['errors' => $e->errors()], 422);
//        }
//    }
//
//    private function getTokenAndRefreshToken($email, $password)
//    {
//        $response = app()->handle(new Request([
//            'grant_type' => 'password',
//            'client_id' => $this->client->id,
//            'client_secret' => $this->client->secret,
//            'username' => $email,
//            'password' => $password,
//            'scope' => '',
//        ]));
//
//        $data = json_decode($response->getContent(), true);
//
//        if (!$response->isOk()) {
//            return response()->json([
//                'message' => 'Invalid credentials'
//            ], 401);
//        }
//
//        $user = User::where('email', $email)->first();
//
//        return response()->json([
//            'user' => $user,
//            'access_token' => $data['access_token'],
//            'refresh_token' => $data['refresh_token'],
//            'token_type' => 'Bearer',
//            'expires_in' => $data['expires_in']
//        ]);
//    }
    protected $client;

    public function __construct()
    {
        $this->client = Client::where('password_client', 1)->first();
        if (!$this->client) {
            \Log::error('Password grant client not found in the database.');
        }
    }

    private function getPasswordGrantClient()
    {
        $client = Client::where('password_client', 1)->first();
        if (!$client) {
            // Log this error
            \Log::error('Password grant client not found in the database.');

            // Optionally, you could create a new client here
            // $client = $this->createPasswordGrantClient();
        }
        return $client;
    }

    // Optionally, add this method to create a new client if one doesn't exist
    private function createPasswordGrantClient()
    {
        $client = new Client();
        $client->name = 'Password Grant Client';
        $client->secret = \Str::random(40);
        $client->redirect = 'http://localhost';
        $client->personal_access_client = false;
        $client->password_client = true;
        $client->revoked = false;
        $client->save();
        return $client;
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
//                'role' => 'required|in:admin,employee,client',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
//                'role' => $request->role,
            ]);

            if (!$this->client) {
                return response()->json(['error' => 'OAuth client not configured properly. Please contact support.'], 500);
            }

            return $this->getTokenAndRefreshToken($user->email, $request->password);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (!$this->client) {
                return response()->json(['error' => 'OAuth client not configured properly. Please contact support.'], 500);
            }

            return $this->getTokenAndRefreshToken($request->email, $request->password);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

    private function getTokenAndRefreshToken($email, $password)
    {
        if (!$this->client) {
            \Log::error('Password grant client is null');
            return response()->json(['error' => 'OAuth client not configured properly'], 500);
        }

        $request = new Request([
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $email,
            'password' => $password,
            'scope' => '',
        ]);

        \Log::info('Token request data', ['request' => $request->all()]);

        $response = app()->handle($request);

        \Log::info('Token request response', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent()
        ]);

        $data = json_decode($response->getContent(), true);

        if (!$response->isOk()) {
            \Log::error('Failed to get token', ['response' => $data]);
            return response()->json([
                'message' => 'Invalid credentials or OAuth error',
                'error' => $data['error'] ?? 'Unknown error',
                'error_description' => $data['error_description'] ?? null
            ], $response->getStatusCode());
        }

        if (!isset($data['access_token']) || !isset($data['refresh_token'])) {
            \Log::error('Token response is missing expected data', ['data' => $data]);
            return response()->json(['error' => 'Unexpected response from auth server'], 500);
        }

        $user = User::where('email', $email)->first();

        return response()->json([
            'user' => $user,
            'access_token' => $data['access_token'],
            'refresh_token' => $data['refresh_token'],
            'token_type' => 'Bearer',
            'expires_in' => $data['expires_in'] ?? null
        ]);
    }
}
