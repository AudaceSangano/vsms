<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Carbon;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('account.profile');

    Route::get('/setting', function () {
        return view('setting');
    })->name('account.setting');


    Route::post('/user', [MainController::class, 'createUser'])->name('user.create');
    Route::post('/user/update', [MainController::class, 'updateUser'])->name('user.update');
    Route::get('/user/list', [MainController::class, 'ListUser'])->name('user.list');
    Route::get('/user/{id}/status', [MainController::class, 'statusUser'])->name('user.status');
    Route::get('/users/{id}', [MainController::class, 'removeUser'])->name('user.remove');
});
