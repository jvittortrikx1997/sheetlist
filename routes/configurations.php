<?php
use App\Http\Controllers\Configurations\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeReportController;

Route::prefix('companies')->group(function () {
    Route::post('/create', [CompanyController::class, 'create']);
    Route::get('/list', [CompanyController::class, 'list']);
});


Route::prefix('time_report')->group(function () {
    Route::post('/import_file', [TimeReportController::class, 'importFile']);
});
