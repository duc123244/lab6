<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth', 'checkactive'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/edit', [UserController::class, 'showEditForm'])->name('user.edit');
    Route::post('/user/edit', [UserController::class, 'updateProfile'])->name('user.update');
    Route::get('/user/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.change-password');
    Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('user.update-password');

    Route::middleware(['checkadmin'])->group(function () {
        Route::get('/admin/users', [UserController::class, 'adminIndex'])->name('admin.users');
        Route::post('/admin/users/{user}/toggle', [UserController::class, 'toggleUserActivation'])->name('admin.users.toggle');
    });
});
