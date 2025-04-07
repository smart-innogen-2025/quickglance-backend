<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;


Route::prefix('auth')->group(function () {
    // Route::get('/csrf-cookie', [AuthController::class, 'sanctumCookie']);
    Route::get('/user', [AuthController::class, 'show'])->middleware('auth:sanctum');
    Route::put('/update/{id}', [AuthController::class, 'update'])->middleware('auth:sanctum');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});