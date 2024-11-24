<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // FROM https://laravel.com/docs/11.x/authentication

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
    //--------------------------------------------------------------------------

//    public function login(Request $request): RedirectResponse
//    {
//        // This validates the incoming request data.
//        // It ensures that an email and password are provided, and that the email is in a valid format.
//        $credentials = $request->validate([
//            'email' => ['required', 'email'],
//            'password' => ['required'],
//        ]);

        // Auth::attempt($credentials) tries to authenticate the user with the provided credentials.
        // If successful, it regenerates the session to prevent session fixation attacks.
        // It then redirects the user to their intended destination (or 'dashboard' if no intended URL was stored).
//        if (Auth::attempt($credentials, $request->boolean('remember'))){
//            $request->session()->regenerate();
//
//            return redirect('admins/');
//        }

//        if (Auth::attempt($credentials, $request->boolean('remember'))) {
//            $request->session()->regenerate();
//
//            $user = Auth::user();
//            switch ($user->getRole()) {
//                case 'admin':
//                    return redirect('admin/');
//                case 'employee':
//                    return redirect('employee/');
//                case 'client':
//                    return redirect('client/');
//                default:
//                    return redirect('/');
//            }
//        }
//
//
//        // If authentication fails, it redirects back to the previous page with an error message,
//        // only keeping the email input to prevent password exposure.
//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ])->onlyInput('email');
//    }
//--------------------------------------------------------------------------

    public function showLoginForm()
    {
        return view('auth.auth');
    }
}
