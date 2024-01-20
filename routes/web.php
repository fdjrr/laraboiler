<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ForgotPassswordController;

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

Route::middleware(['guest'])->group(function () {
  Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('auth.login');

    Route::get('forgot-password', [ForgotPassswordController::class, 'index'])->name('auth.forgot_password');
  });
});

Route::middleware(['auth'])->group(function () {
  Route::get('', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('qrcode', [DashboardController::class, 'qrcode']);
  Route::post('verifikasi', [DashboardController::class, 'verifikasi']);

  Route::prefix('user')->controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('user.profile');
  });

  Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('', 'index')->name('users')->middleware(['can:view users']);
    Route::get('{user}/edit', 'edit')->name('user.edit')->middleware(['can:edit user']);
  });

  Route::prefix('roles')->controller(RoleController::class)->group(function () {
    Route::get('', 'index')->name('roles')->middleware(['can:view roles']);
    Route::get('{role}/edit', 'edit')->name('role.edit')->middleware(['can:edit role']);
  });

  Route::prefix('permissions')->controller(PermissionController::class)->group(function () {
    Route::get('', 'index')->name('permissions')->middleware(['can:view permissions']);
    Route::get('{permission}/edit', 'edit')->name('permission.edit')->middleware(['can:edit permission']);
  });
});
