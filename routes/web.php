<?php

use App\Helpers\MainHelper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AuthController;

// Kirish sahifalari
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/user_login', [AuthController::class, 'user'])->name('user.login');
Route::get('/manager_login', [AuthController::class, 'manager'])->name('manager.login');

// Kirish so'rovlarini qayta ishlash
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('user_authenticate', [AuthController::class, 'user_authenticate'])->name('user.authenticate');
Route::post('manager_authenticate', [AuthController::class, 'manager_authenticate'])->name('manager.authenticate');

// Admin bo'limi
Route::middleware(['auth', 'checkPermission:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('clients', ClientController::class);
        Route::resource('amounts', AmountController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('employees', EmployeesController::class);
        Route::resource('managers', ManagerController::class);
        Route::resource('notifications', NotificationController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('works', WorkController::class);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

// Manager bo'limi
Route::middleware(['auth', 'checkPermission:manager'])->group(function () {
    Route::prefix('manager')->group(function () {
        Route::resource('clients', ClientController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('employees', EmployeesController::class);
        Route::resource('notifications', NotificationController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('works', WorkController::class);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

// User bo'limi
Route::middleware(['auth', 'checkPermission:user'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::resource('notifications', NotificationController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('works', WorkController::class);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

// Foydalanuvchilarni eksport qilish
Route::get('users/export', [ClientController::class, 'export']);
