<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Carbon;

Route::middleware(['auth'])->group(function () {
    Route::post('/create/create', [AdminController::class, 'createAddress'])->name('address');

});
