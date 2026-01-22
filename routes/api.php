<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/availability', [AvailabilityController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);