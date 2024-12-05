<?php

use App\Http\Controllers\Calendar;
use App\Http\Controllers\Web\Auth\{LoginController, LogoutController, RegisterController};
use App\Http\Controllers\Web\Employee\AppointmentController;
use App\Http\Controllers\Web\{Admin, Employee, Client};
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;


Route::aliasMiddleware('role', CheckRole::class);

Route::view('/', 'welcome')->name('welcome');
Route::view('/services', 'services')->name('services');
Route::view('/auth', 'auth.auth')->name('auth');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard-data', [Admin\DashboardController::class, 'getDashboardData'])->name('dashboard.data');

    Route::prefix('employees')->group(function () {
        Route::get('trashed', [Admin\EmployeeController::class, 'trashed'])->name('employees.trashed');
        Route::patch('{employee}/restore', [Admin\EmployeeController::class, 'restore'])->name('employees.restore');
        Route::delete('{employee}/forceDelete', [Admin\EmployeeController::class, 'forceDelete'])->name('employees.forceDelete');
    });
    Route::resource('employees', Admin\EmployeeController::class);

    Route::prefix('clients')->group(function () {
        Route::get('trashed', [Admin\ClientController::class, 'trashed'])->name('clients.trashed');
        Route::patch('{client}/restore', [Admin\ClientController::class, 'restore'])->name('clients.restore');
        Route::delete('{client}/forceDelete', [Admin\ClientController::class, 'forceDelete'])->name('clients.forceDelete');
    });

    Route::resource('clients', Admin\ClientController::class);

    Route::resource('pets', \App\Http\Controllers\Web\Admin\PetController::class);
//    Route::resource('pets', Admin\PetController::class);

    Route::prefix('appointments')->group(function () {
        Route::get('/trashed', [Admin\AppointmentController::class, 'trashed'])->name('appointments.trashed');
        Route::patch('/restore/{id}', [Admin\AppointmentController::class, 'restore'])->name('appointments.restore');
        Route::delete('/cancel/{id}', [Admin\AppointmentController::class, 'cancel'])->name('appointments.cancel');
        Route::delete('/force-delete/{id}', [Admin\AppointmentController::class, 'forceDelete'])->name('appointments.forceDelete');
    });
    Route::resource('appointments', Admin\AppointmentController::class);

    Route::resource('services', Admin\ServiceController::class);
});
//Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
//    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
//    Route::get('dashboard-data', [Admin\DashboardController::class, 'getDashboardData'])->name('dashboard.data');
//
//    Route::prefix('employees')->group(function () {
//        Route::get('trashed', [Admin\EmployeeController::class, 'trashed'])->name('employees.trashed');
//        Route::delete('{employee}', [Admin\EmployeeController::class, 'destroy'])->name('employees.destroy');
//        Route::patch('{employee}/restore', [Admin\EmployeeController::class, 'restore'])->name('employees.restore');
//        Route::delete('{employee}/forceDelete', [Admin\EmployeeController::class, 'forceDelete'])->name('employees.forceDelete');
//    });
//
//    Route::resource('employees', Admin\EmployeeController::class);
//    Route::prefix('clients')->group(function () {
//        Route::get('trashed', [Admin\ClientController::class, 'trashed'])->name('clients.trashed');
//        Route::delete('{client}', [Admin\ClientController::class, 'destroy'])->name('clients.destroy');
//        Route::patch('{client}/restore', [Admin\ClientController::class, 'restore'])->name('clients.restore');
//        Route::delete('{client}/forceDelete', [Admin\ClientController::class, 'forceDelete'])->name('clients.forceDelete');
//    });
//    Route::resource('clients', Admin\ClientController::class);
//    Route::resource('pets', Admin\PetController::class);
//    Route::resource('appointments', Admin\AppointmentController::class);
//
//    Route::prefix('appointments')->group(function () {
//        // List canceled appointments (soft-deleted)
//        Route::get('/trashed', [Admin\AppointmentController::class, 'trashed'])->name('appointments.trashed');
//        // Restore canceled appointment
//        Route::patch('/restore/{id}', [Admin\AppointmentController::class, 'restore'])->name('appointments.restore');
//        // Cancel appointments (soft delete)
//        Route::delete('/cancel/{id}', [Admin\AppointmentController::class, 'cancel'])->name('appointments.cancel');
//        // Permanently delete appointment
//        Route::delete('/force-delete/{id}', [Admin\AppointmentController::class, 'forceDelete'])->name('appointments.forceDelete');
//    });
//    Route::resource('services', Admin\ServiceController::class);
//});
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('dashboard', [Employee\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('clients', Employee\ClientController::class);
//    Route::resource('pets', Employee\PetController::class);
    Route::resource('pets', \App\Http\Controllers\Web\Employee\PetController::class);

    Route::prefix('appointments')->group(function () {
        Route::get('/trashed', [Employee\AppointmentController::class, 'trashed'])->name('appointments.trashed');
        Route::patch('/restore/{id}', [Employee\AppointmentController::class, 'restore'])->name('appointments.restore');
        Route::delete('/cancel/{id}', [Employee\AppointmentController::class, 'cancel'])->name('appointments.cancel');
    });
    Route::resource('appointments', Employee\AppointmentController::class);
});
//Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
//    Route::get('dashboard', [Employee\DashboardController::class, 'index'])->name('dashboard');
//    Route::resource('clients', Employee\ClientController::class);
//    Route::resource('pets', Employee\PetController::class);
//    Route::resource('appointments', Employee\AppointmentController::class);
//
//    Route::prefix('appointments')->group(function () {
//        // List canceled appointments (soft-deleted)
//        Route::get('/trashed', [AppointmentController::class, 'trashed'])->name('appointments.trashed');
//        // Restore canceled appointment
//        Route::patch('/restore/{id}', [AppointmentController::class, 'restore'])->name('appointments.restore');
//        // Cancel appointments (soft delete)
//        Route::delete('/cancel/{id}', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
//    });
//});

Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('dashboard', [Client\DashboardController::class, 'index'])->name('dashboard');
//    Route::resource('pets', Client\PetController::class);
    Route::resource('pets', \App\Http\Controllers\Web\Client\PetController::class);

    Route::prefix('appointments')->group(function () {
        Route::delete('/cancel/{id}', [Client\AppointmentController::class, 'cancel'])->name('appointments.cancel');
    });
    Route::resource('appointments', Client\AppointmentController::class);
});

//Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
//    Route::get('dashboard', [Client\DashboardController::class, 'index'])->name('dashboard');
//    Route::resource('pets', Client\PetController::class);
//    Route::resource('appointments', Client\AppointmentController::class);
//    Route::prefix('appointments')->group(function () {
//        // Cancel appointments (soft delete)
//        Route::delete('/cancel/{id}', [Client\AppointmentController::class, 'cancel'])->name('appointments.cancel');
//    });
//});

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

//Route::post('/calendar/navigate', [Calendar::class, 'navigate'])->name('calendar.navigate');
//Route::post('/calendar/select', [Calendar::class, 'selectDay'])->name('calendar.select');
