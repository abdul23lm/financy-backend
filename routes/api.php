<?php

use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\{Route, Auth};

Auth::loginUsingId(1);
Route::middleware('auth:sanctum')->group(function () {

    Route::get('me', [MeController::class, '__invoke']);

    Route::prefix('finance')->group(function () {
        Route::post('create', [FinanceController::class, 'store']);
    });
});
