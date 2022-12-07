<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Base\AuthController;
use App\Http\Controllers\MailController;
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

    Route::prefix('roles')->group(function () {
        Route::get('/create', [RoleController::class, 'create']);

        Route::get('/{id}', [RoleController::class, 'show']);

        Route::get('/', [RoleController::class, 'index']);
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [PermissionController::class, 'create']);

        Route::get('/{id}', [PermissionController::class, 'show']);

        Route::get('/', [PermissionController::class, 'index']);
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


Route::get('/sendmail', [MailController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
