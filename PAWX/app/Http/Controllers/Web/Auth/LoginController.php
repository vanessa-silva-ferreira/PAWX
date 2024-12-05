<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();
            return $this->redirectBasedOnRole($user);
        }
        return back()->withErrors([
            'styled_error_email' => '
        <div class="mt-1 flex items-center text-pawx-orange">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <span class="text-sm text-gray-500">Email ou palavra-passe incorreto.</span>
        </div>
    ',
        ])->onlyInput('email');
    }

    private function redirectBasedOnRole($user): RedirectResponse
    {
        switch ($user->getRole()) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'employee':
                return redirect()->route('employee.dashboard');
            case 'client':
                return redirect()->route('client.dashboard');
            default:
                return redirect('home');
        }
    }

    public function showLoginForm()
    {
        return view('auth.auth');
    }
}
