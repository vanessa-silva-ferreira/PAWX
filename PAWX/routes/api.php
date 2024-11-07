<?php

use App\Http\Controllers\PetController;
use App\Http\Middleware\CheckCustomSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::aliasMiddleware('custom.session', CheckCustomSession::class);



use App\Http\Controllers\Api\Auth\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('custom.session');

Route::middleware(['custom.session'])->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user_data);
    });

    Route::apiResource('pets', PetController::class);
});


//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    })->middleware('auth:api');


//Route::post('/login', [AuthController::class, 'login']);
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
