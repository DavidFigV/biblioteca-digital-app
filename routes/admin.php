<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('roles', RoleController::class)->except('show');
Route::resource('users', UserController::class)->except('show');
