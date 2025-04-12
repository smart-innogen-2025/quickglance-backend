<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Shortcut,
    App\Http\Controllers\AutomationController;


Route::prefix('automation')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [AutomationController::class, 'index']);
    Route::get('/create', [AutomationController::class, 'create']);
    Route::post('/', [AutomationController::class, 'store']);
});