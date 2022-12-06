<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Base\AuthController;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/{id}', [UserController::class, 'show']);

        Route::get('', [UserController::class, 'index']);
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/create', [BlogController::class, 'create']);

        Route::get('/{id}', [BlogController::class, 'show']);

        Route::get('/', [BlogController::class, 'index']);
    });
});

Route::prefix('blogs')->group(function () {
    Route::get('/create', [\App\Http\Controllers\User\BlogController::class, 'create']);

    Route::get('/{id}', [\App\Http\Controllers\User\BlogController::class, 'show']);

    Route::get('', [\App\Http\Controllers\User\BlogController::class, 'index']);
});

Route::prefix('users')->group(function () {
    Route::get('/password', [\App\Http\Controllers\User\UserController::class, 'changePassword']);

    Route::get('/', [\App\Http\Controllers\User\UserController::class, 'index']);
});


Route::prefix('auth')->group(function () {

    Route::get('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'register']);
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
