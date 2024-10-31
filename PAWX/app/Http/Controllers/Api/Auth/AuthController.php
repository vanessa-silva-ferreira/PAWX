<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user)
            {
                try {
                    $success['token'] =  $user->createToken('userToken')-> plainTextToken;
                    return response($success, 'User login successfully.');
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Could not create token: ' . $e->getMessage()], 500);
                }
            }
            else {
                return response()->json(['error' => 'Not a user!'], 401);
            }
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
