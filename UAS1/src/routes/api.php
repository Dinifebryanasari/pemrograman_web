<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AnakController;

Route::prefix('anaks')->middleware('apikey')->group(function () {
    Route::get('/', [AnakController::class, 'index']);
    Route::post('/', [AnakController::class, 'store']);
    Route::get('{id}', [AnakController::class, 'show']);
    Route::put('{id}', [AnakController::class, 'update']);
    Route::delete('{id}', [AnakController::class, 'destroy']);
});


Route::prefix('kelas')->middleware('apikey')->group(function () {
    Route::get('/', [KelasController::class, 'index']);
    Route::post('/', [KelasController::class, 'store']);
    Route::get('{id}', [KelasController::class, 'show']);
    Route::put('{id}', [KelasController::class, 'update']);
    Route::delete('{id}', [KelasController::class, 'destroy']);
});
