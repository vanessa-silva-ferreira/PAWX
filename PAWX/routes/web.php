<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Calendar;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\LogoutController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Web\Employee;
use App\Http\Controllers\Web\Client;


Route::aliasMiddleware('role', CheckRole::class);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/services', function () {
    return view('services');
})->name('services');
//
//Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::post('login', [LoginController::class, 'login']);
//Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//Route::post('register', [RegisterController::class, 'register']);

Route::get('auth', function () {
    return view('auth.auth');
})->name('auth');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::resource('appointments', AppointmentController::class);

    // Additional routes
    Route::prefix('appointments')->group(function () {
        // List canceled appointments (soft-deleted)
        Route::get('/trashed', [AppointmentController::class, 'trashed'])->name('appointments.trashed');

        // Restore canceled appointment
        Route::patch('/restore/{id}', [AppointmentController::class, 'restore'])->name('appointments.restore');

        // Cancel appointments (soft delete)
        Route::delete('/cancel/{id}', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
    });
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('employees')->group(function () {
        Route::get('trashed', [Admin\EmployeeController::class, 'trashed'])->name('employees.trashed');
        Route::delete('{employee}', [Admin\EmployeeController::class, 'destroy'])->name('employees.destroy');
        Route::patch('{employee}/restore', [Admin\EmployeeController::class, 'restore'])->name('employees.restore');
        Route::delete('{employee}/forceDelete', [Admin\EmployeeController::class, 'forceDelete'])->name('employees.forceDelete');
    });
    Route::resource('employees', Admin\EmployeeController::class);

    Route::prefix('clients')->group(function () {
        Route::get('trashed', [Admin\ClientController::class, 'trashed'])->name('clients.trashed');
        Route::delete('{client}', [Admin\ClientController::class, 'destroy'])->name('clients.destroy');
        Route::patch('{client}/restore', [Admin\ClientController::class, 'restore'])->name('clients.restore');
        Route::delete('{client}/forceDelete', [Admin\ClientController::class, 'forceDelete'])->name('clients.forceDelete');
    });
    Route::resource('clients', Admin\ClientController::class);

    Route::resource('pets', Admin\PetController::class);
});

Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('dashboard', [Employee\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('clients', Employee\ClientController::class);
    Route::resource('pets', Employee\PetController::class);
});

Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('dashboard', [Client\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pets', Client\PetController::class);
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
