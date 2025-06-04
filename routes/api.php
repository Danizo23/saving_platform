<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SavingsPlanController;
use App\Http\Controllers\UserSavingController;
use App\Http\Controllers\TransactionController;

// Savings Plans (Public)
Route::get('/plans', [SavingsPlanController::class, 'index']);
Route::get('/plans/{id}', [SavingsPlanController::class, 'show']);

// User Savings (Authenticated)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/savings', [UserSavingController::class, 'index']);
    Route::post('/user/savings', [UserSavingController::class, 'store']);
    Route::get('/user/savings/{id}', [UserSavingController::class, 'show']);
});

// Transactions (Authenticated)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/transactions', [TransactionController::class, 'index']);
    Route::post('/user/transactions', [TransactionController::class, 'store']);
});
