<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->withoutMiddleware('auth:sanctum');
    Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');

    Route::get('/get_user', [AuthController::class, 'user']);
});
