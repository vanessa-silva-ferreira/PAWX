<?php

namespace App\Http\Controllers\Web\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class LogoutController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
