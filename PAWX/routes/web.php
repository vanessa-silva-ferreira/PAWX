<?php

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

/*
Route::middleware('auth')->group(function () {
    Route::get('/logout', "LogoutController@logout");
    //Route::get('/admins', [AdminController::class, 'dashboard']);
});
*/

//Route::middleware(['auth', 'role:admin'])->group(function () {
//    Route::get('/admins', [AdminController::class, 'dashboard']);
//    Route::get('/logout', "LogoutController@logout");
//});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admins', [AdminController::class, 'dashboard']);
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'dashboard']);
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/clients', [ClientController::class, 'dashboard']);
    //Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
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
