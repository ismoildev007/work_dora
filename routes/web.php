<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmountController;
use App\Http\Controllers\ClientController;



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

Route::resource('clients', ClientController::class);

Route::resource('amounts', AmountController::class);


Route::get('/', function () {
    return view('welcome');
});
