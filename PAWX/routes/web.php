<?php

use App\Http\Controllers\Web\AdminController;

use App\Http\Controllers\Calendar;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\Web\Auth\LogoutController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

// Set middleware aliases
Route::aliasMiddleware('role', CheckRole::class);

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


Route::middleware(['auth', 'role:admin'])->name('')->prefix('admin')->group( function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/create/{type}', [AdminController::class, 'createUser'])->name('admin.create');
    Route::post('/create/{type}', [AdminController::class, 'storeUser'])->name('admin.store');
    // change the order of the create or the update
    Route::get('/{type}/update/{id}', [AdminController::class, 'editUser'])->name('admin.edit');
    Route::post('/{type}/update/{id}', [AdminController::class, 'updateUser'])->name('admin.update');

    Route::get('/list/{type}', [AdminController::class, 'index'])->name('admin.index')->where('type', 'employee|client');
});

Route::middleware(['auth', 'role:employee'])->name('')->prefix('employee')->group( function () {
    Route::get('/', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/create/{type}', [EmployeeController::class, 'createUser'])->name('employee.create');
    Route::post('/create/{type}', [EmployeeController::class, 'storeUser'])->name('employee.store');

    Route::get('/{type}/update/{id}', [EmployeeController::class, 'editUser'])->name('employee.edit');
    Route::post('/{type}/update/{id}', [EmployeeController::class, 'updateUser'])->name('employee.update');

    Route::get('/list/{type}', [EmployeeController::class, 'index'])->name('employee.index')->where('type', 'client');
});

// EMPLOYEE
//Route::middleware(['auth', 'role:employee'])->group(function () {
//    Route::get('/employees', [EmployeeController::class, 'dashboard']);
//});



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

Route::post('/calendar/navigate', [Calendar::class, 'navigate'])->name('calendar.navigate');
Route::post('/calendar/select', [Calendar::class, 'selectDay'])->name('calendar.select');
