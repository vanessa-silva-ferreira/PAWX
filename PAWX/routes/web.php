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
