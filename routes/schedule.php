<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Carbon;

Route::middleware(['auth'])->group(function () {
    Route::get('/schedule', [AdminController::class, 'index'])->name('schedule.list');
    Route::post('/schedule', [AdminController::class, 'schedule'])->name('schedule.create');

    Route::get('/my/schedule', [AdminController::class, 'mySchedule'])->name('mySchedule.list');
});
