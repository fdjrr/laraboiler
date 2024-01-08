<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
      Route::patch('profile', 'update')->name('api.v2.user.profile.update');
    });

    Route::prefix('users')->controller(UserController::class)->group(function () {
      Route::get('', 'index')->name('api.v2.users')->middleware(['can:view users']);
      Route::get('{user}', 'show')->name('api.v2.user.show')->middleware(['can:edit user']);
      Route::post('', 'store')->name('api.v2.user.store')->middleware(['can:create user']);
      Route::post('export', 'export')->name('api.v2.user.export')->middleware(['can:export user']);
      Route::post('import', 'import')->name('api.v2.user.import')->middleware(['can:import user']);
      Route::patch('{user}', 'update')->name('api.v2.user.update')->middleware(['can:edit user']);
      Route::delete('{user}', 'destroy')->name('api.v2.user.destroy')->middleware(['can:delete user']);
    });

    Route::prefix('roles')->controller(RoleController::class)->group(function () {
      Route::get('', 'index')->name('api.v2.roles')->middleware(['can:view roles']);
      Route::get('{role}', 'show')->name('api.v2.role.show')->middleware(['can:edit role']);
      Route::post('', 'store')->name('api.v2.role.store')->middleware(['can:create role']);
      Route::patch('{role}', 'update')->name('api.v2.role.update')->middleware(['can:edit role']);
    });

    Route::prefix('permissions')->controller(PermissionController::class)->group(function () {
      Route::get('', 'index')->name('api.v2.permissions')->middleware(['can:view permissions']);
      Route::get('{permission}', 'show')->name('api.v2.permission.show')->middleware(['can:edit permission']);
      Route::post('', 'store')->name('api.v2.permission.store')->middleware(['can:create permission']);
      Route::patch('{permission}', 'update')->name('api.v2.permission.update')->middleware(['can:edit permission']);
    });
  });
});
