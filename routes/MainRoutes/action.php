<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActionController;


Route::prefix('action')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ActionController::class, 'index']);
    Route::post('/', [ActionController::class, 'store']);
});