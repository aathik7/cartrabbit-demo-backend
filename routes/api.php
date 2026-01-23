<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/availability', [AvailabilityController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);

Route::prefix('admin')->group(function () {
    Route::get('/availability', [AdminController::class, 'index']);
    Route::post('/availability', [AdminController::class, 'store']);
    Route::patch('/availability/{id}/toggle', [AdminController::class, 'toggle']);
});