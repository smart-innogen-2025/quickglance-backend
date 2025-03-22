<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;


Route::prefix('search')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [SearchController::class, 'search']);
});