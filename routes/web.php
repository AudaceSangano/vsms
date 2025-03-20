<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('authentication.login');
})->name('login');

Route::get('/password-reset', [AuthController::class, 'reset'])->name('password.reset');
Route::get('/password-confirm', [AuthController::class, 'two_step'])->name('password.confirm');
Route::post('/password-verify', [AuthController::class, 'pin_verify'])->name('verification.verify');
Route::post('/password/reset/phone', [AuthController::class, 'validatePhone'])->name('password.forget');
Route::post('/login/operation', [AuthController::class, 'authenticate'])->name('login.operation');

require 'main.php';

Route::get('/profile', function () {
    return view('profile');
})->name('account.profile');

Route::get('/user/{user}/address',  [AuthController::class, 'address'])->name('account.setting.set');

Route::get('/logout/operation', [AuthController::class, 'logout'])->name('logout.operation');
Route::post('/setting/operation', [AuthController::class, 'update'])->name('setting.password.change');
Route::post('/setting/profile', [AuthController::class, 'updateProfile'])->name('setting.profile.change');

require 'car.php';
require 'schedule.php';
require 'address.php';
require 'report.php';
