<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('roles', RoleController::class)->except('show');
Route::resource('users', UserController::class)->except('show');
Route::resource('categories', CategoryController::class)->except('show');
Route::resource('ebooks', EbookController::class)->except('show');
