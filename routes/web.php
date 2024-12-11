<?php

use App\Http\Controllers\Calendar;
use App\Http\Controllers\Web\Auth\{LoginController, LogoutController, RegisterController};
use App\Http\Controllers\Web\{Admin, Employee, Client, ExportController, UserManagementController};
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;


Route::aliasMiddleware('role', CheckRole::class);

Route::view('/', 'welcome')->name('welcome');
Route::view('/services', 'welcome-services')->name('welcome-services');
Route::view('/gallery', 'welcome-gallery')->name('welcome-gallery');
Route::view('/feedback', 'welcome-feedback')->name('welcome-feedback');
Route::view('/about', 'welcome-about')->name('welcome-about');
Route::view('/contact', 'welcome-contact')->name('welcome-contact');
Route::view('/remember', 'welcome-remember')->name('welcome-remember');
Route::view('/auth', 'auth.auth')->name('auth');


Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// ADMIN ---------------------------------------------------------------------------------------------------------------------------------
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard-data', [Admin\DashboardController::class, 'getDashboardData'])->name('dashboard.data');

    Route::get('/account/edit', [UserManagementController::class, 'editUser'])->name('account.edit');
    Route::put('/account/update', [UserManagementController::class, 'updateUser'])->name('account.update');

    Route::get('employees/export', [Admin\ExportController::class, 'exportEmployees'])->name('employees.export');
    Route::resource('employees', Admin\EmployeeController::class);

    Route::get('clients/export', [ExportController::class, 'exportClients'])->name('clients.export');
    Route::resource('clients', Admin\ClientController::class);

    Route::get('pets/export', [ExportController::class, 'exportPets'])->name('pets.export');
    Route::resource('pets', \App\Http\Controllers\Web\Admin\PetController::class);

//    Route::prefix('appointments')->group(function () {
//        Route::delete('/cancel/{id}', [Admin\AppointmentController::class, 'cancel'])->name('appointments.cancel');
//    });

    Route::get('appointments/export', [ExportController::class, 'exportAppointments'])->name('appointments.export');
    Route::resource('appointments', Admin\AppointmentController::class);

    Route::get('services/export', [Admin\ExportController::class, 'exportServices'])->name('services.export');
    Route::resource('services', Admin\ServiceController::class);

    Route::get('financial-reports/export', [Admin\ExportController::class, 'exportFinancialReports'])->name('financial-reports.export');
    Route::get('/financial-reports', [Admin\FinancialReportController::class, 'index'])->name('financial-reports.index');

    Route::get('notifications/by-date', [Admin\NotificationController::class, 'getAppointmentsByDate'])
        ->name('notifications.by-date');
    Route::get('/notifications/monthly', [Admin\NotificationController::class, 'getAppointmentsByMonth'])->name('notifications.monthly');

    Route::prefix('trashed')->group(function () {
        Route::get('/', [App\Http\Controllers\Web\Admin\TrashController::class, 'index'])->name('trashed.index');
        Route::patch('{id}/{type}/restore', [App\Http\Controllers\Web\Admin\TrashController::class, 'restore'])->name('trashed.restore');
        Route::delete('{id}/{type}/forceDelete', [App\Http\Controllers\Web\Admin\TrashController::class, 'forceDelete'])->name('trashed.forceDelete');
    });
});
// ADMIN ---------------------------------------------------------------------------------------------------------------------------------

// EMPLOYEE ------------------------------------------------------------------------------------------------------------------------------
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('dashboard', [Employee\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/account/edit', [UserManagementController::class, 'editUser'])->name('account.edit');
    Route::put('/account/update', [UserManagementController::class, 'updateUser'])->name('account.update');

    Route::resource('clients', Employee\ClientController::class);
//    Route::resource('pets', Employee\PetController::class);
    Route::resource('pets', \App\Http\Controllers\Web\Employee\PetController::class);

    Route::resource('appointments', Employee\AppointmentController::class);
});
// EMPLOYEE ------------------------------------------------------------------------------------------------------------------------------

// CLIENT --------------------------------------------------------------------------------------------------------------------------------
Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('dashboard', [Client\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/account/edit', [UserManagementController::class, 'editUser'])->name('account.edit');
    Route::put('/account/update', [UserManagementController::class, 'updateUser'])->name('account.update');

    Route::resource('pets', \App\Http\Controllers\Web\Client\PetController::class);

//    Route::prefix('appointments')->group(function () {
//        Route::delete('/cancel/{id}', [Client\AppointmentController::class, 'cancel'])->name('appointments.cancel');
//    });
    Route::resource('appointments', Client\AppointmentController::class);
});
// CLIENT --------------------------------------------------------------------------------------------------------------------------------

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

Route::get('/google/redirect', [App\Http\Controllers\Web\Auth\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\Web\Auth\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::post('/calendar/navigate', [Calendar::class, 'navigate'])->name('calendar.navigate');
Route::post('/calendar/select', [Calendar::class, 'selectDay'])->name('calendar.select');
