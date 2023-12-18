<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentCarController;
use App\Http\Controllers\ReturnCarController;
use Illuminate\Support\Facades\Route;

// User
Route::get('/login', [AuthenticationController::class, 'verify'])->middleware(['web', 'guest']);
Route::post('/login', [AuthenticationController::class, 'login'])->middleware(['web', 'guest']);
Route::get('/register', [AuthenticationController::class, 'register'])->middleware(['web', 'guest']);
Route::post('/register', [AuthenticationController::class, 'create'])->middleware(['web', 'guest']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth.session']);

// Car
Route::get('/', [CarController::class, 'index'])->middleware(['auth.session']);
Route::get('/new/car', [CarController::class, 'create'])->middleware(['auth.session']);
Route::post('/new/car', [CarController::class, 'store'])->middleware(['auth.session']);

// Rent
Route::get('/profile', [AuthenticationController::class, 'profile'])->middleware(['auth.session']);
Route::get('/rent/car/{id}', [RentCarController::class, 'create'])->middleware(['auth.session']);
Route::post('/rent/car/{id}', [RentCarController::class, 'store'])->middleware(['auth.session']);

// Return
Route::get('/return/car/{car_rented_away}', [ReturnCarController::class, 'create'])->middleware(['auth.session']);
Route::post('/return/car/{car_rented_away}', [ReturnCarController::class, 'store'])->middleware(['auth.session']);