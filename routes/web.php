<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class);

Route::middleware('auth')->group(function () {
    Route::get('account', [AccountController::class, 'account'])->name('account');
    Route::patch('account', [AccountController::class, 'updateAccount'])->name('account.update');
    Route::get('password', [AccountController::class, 'password'])->name('password');
    Route::patch('password', [AccountController::class, 'updatePassword'])->name('password.update');
});
