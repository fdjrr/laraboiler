<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
  });
});

Route::middleware(['auth'])->group(function () {
  Route::get('', [DashboardController::class, 'index'])->name('dashboard');

  Route::prefix('user')->controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('user.profile');
  });
});
