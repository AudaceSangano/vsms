<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Carbon;

Route::middleware(['auth'])->group(function () {
    Route::post('/create', [CarController::class, 'createCar'])->name('car.create');
    Route::get('/cars', [CarController::class, 'listCars'])->name('car.list');
    Route::get('/car/{id}', [CarController::class, 'statusCar'])->name('car.status');
    Route::get('/car/remove/{id}', [CarController::class, 'removeCars'])->name('car.remove');
    Route::post('/car/modify', [CarController::class, 'updateCar'])->name('car.update');
    Route::post('/cartodriver', [CarController::class, 'assignCarToDriver'])->name('car.assign.create');
    Route::post('/cartoemployee', [CarController::class, 'assignCarToEmployee'])->name('car.assign2.create');

});
