<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
  Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
      Route::prefix('login')->controller(LoginController::class)->group(function () {
        Route::post('', 'verify')->name('api.v1.auth.login');
      });
    });
  });

  Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
      Route::get('logout', 'logout')->name('api.v2.auth.logout');
    });

    Route::prefix('user')->controller(ProfileController::class)->group(function () {
      Route::get('profile', 'index')->name('api.v2.user.profile');
      Route::patch('profile', 'update')->name('api.v2.update.user.profile');
    });
  });
});
