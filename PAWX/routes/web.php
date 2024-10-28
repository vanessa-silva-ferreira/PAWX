<?php

use App\Http\Controllers\Web\Auth\SocialLoginController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\Auth\LogoutController;

use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


//Route::get('auth/{provider}/redirect', [SocialLoginController::class , 'redirect'])->name('auth.socialite.redirect');
//Route::get('auth/{provider}/callback', [SocialLoginController::class , 'callback'])->name('auth.socialite.callback');

Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);


//Route::get('login/google', function () {
//    return Socialite::driver('google')->redirect();
//})->name('login.google');
//
//Route::get('login/google/callback', function () {
//    $googleUser = Socialite::driver('google')->user();
//
//    // Check if user exists in your database, then log them in, or create a new user.
//    $user = User::updateOrCreate(
//        ['google_id' => $googleUser->id],
//        [
//            'name' => $googleUser->name,
//            'email' => $googleUser->email,
//        ]
//    );
//
//    Auth::login($user);
//
//    return redirect()->intended('dashboard');
//});





// So it doesn't give conflicts when logging out in different roles
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admins', [AdminController::class, 'dashboard']);
});
// EMPLOYEE
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'dashboard']);
});
// CLIENT
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/clients', [ClientController::class, 'dashboard'])->name('clients');
});


Route::get('/test-role', function () {
    $user = auth()->user();
    return [
        'user_id' => $user->id,
        'email' => $user->email,
        'role' => $user->getRole(),
        'is_admin' => $user->hasRole('admin'),
        'is_employee' => $user->hasRole('employee'),
        'is_client' => $user->hasRole('client'),
    ];
});
