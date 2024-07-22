<?php

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



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login'])->name('/');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::middleware(['checkRole:admin', 'auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('clients', ClientController::class);

        Route::resource('amounts', AmountController::class);

        Route::resource('departments', DepartmentController::class);

        Route::resource('employees', EmployeesController::class);

        Route::resource('managers', ManagerController::class);

        Route::resource('notifications', NotificationController::class);

        Route::resource('projects', ProjectController::class);

        Route::resource('statuses', StatusController::class);

        Route::resource('works', WorkController::class);
    });
});

Route::get('users/export', [ClientController::class, 'export']);




//
//Route::get('/', function () {
//    return view('welcome');
//});
