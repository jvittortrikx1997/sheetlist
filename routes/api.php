<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CompanyController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register'])->withoutMiddleware('auth:sanctum');
        Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');

        Route::get('/get_user', [AuthController::class, 'user']);
    });

    Route::prefix('companies')->group(function () {
        Route::post('/create', [CompanyController::class, 'create']);
        Route::get('/list', [CompanyController::class, 'list']);
    });


});
