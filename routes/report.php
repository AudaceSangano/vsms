<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::middleware(['auth'])->group(function () {
    Route::get('/drivers', [ReportController::class, 'driverList'])->name('report.driver.list');
    Route::get('/employees', [ReportController::class, 'employeeList'])->name('report.employee.list');
    Route::get('/day/shift', [ReportController::class, 'dayScheduleList'])->name('shift.day.list');
    Route::get('/night/shift', [ReportController::class, 'nightScheduleList'])->name('shift.night.list');
});
