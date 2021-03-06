<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\User\Permission\PermissionIndex;
use App\Http\Livewire\User\RoleIndex;
use App\Http\Livewire\User\UserEdit;
use App\Http\Livewire\User\UserIndex;
use App\Http\Livewire\User\UserView;
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

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->controller(AccountController::class)->group(function () {
    Route::get('profile', 'profile')->name('profile');
    Route::patch('profile', 'updateProfile');
    
    Route::get('password', 'password')->name('password');
    Route::patch('password', 'updatePassword');

    Route::get('two-factor-authentication', 'twoFactorAuth')->name('2fa');

    Route::get('token', 'token')->name('token');
    Route::post('token', 'createToken');

    Route::get('delete', 'delete')->name('delete');
    Route::post('delete', 'deletePermanently');

    Route::get('user', UserIndex::class)->middleware('can:view user')->name('user');
    Route::get('user/{id}', UserView::class)->middleware('can:view user')->name('user.view');
    Route::get('user/edit/{id}', UserEdit::class)->middleware('can:edit user')->name('user.edit');
    Route::get('role', RoleIndex::class)->middleware('can:view role')->name('role');
    Route::get('permission', PermissionIndex::class)->middleware('can:view permission')->name('permission');
});
