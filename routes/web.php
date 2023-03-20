<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'dashboard']);
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/edit/{user}', [UserController::class, 'edit']);
        Route::put('/update/{user}', [UserController::class, 'update']);
        Route::get('/edit-password/{user}', [UserController::class, 'editPassword']);
        Route::put('/update-password/{user}', [UserController::class, 'updatePassword']);
        Route::get('/delete/{user}', [UserController::class, 'delete']);
    });
});


Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
