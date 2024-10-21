<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // FROM https://laravel.com/docs/11.x/authentication
    public function login (Request $request): RedirectResponse
    {
        // This validates the incoming request data.
        // It ensures that an email and password are provided, and that the email is in a valid format.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Auth::attempt($credentials) tries to authenticate the user with the provided credentials.
        // If successful, it regenerates the session to prevent session fixation attacks.
        // It then redirects the user to their intended destination (or 'dashboard' if no intended URL was stored).
        if (Auth::attempt($credentials, $request->boolean('remember'))){
            $request->session()->regenerate();

            return redirect()->intended('admin-dashboard');
        }

        // If authentication fails, it redirects back to the previous page with an error message,
        // only keeping the email input to prevent password exposure.
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showLoginForm(){
        return view('auth.login');
    }
}
