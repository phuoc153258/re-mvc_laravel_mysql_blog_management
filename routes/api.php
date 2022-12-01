<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\FileApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PermissionApiController;
use App\Http\Controllers\Api\RoleApiController;

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::patch('/{id}/password', [UserApiController::class, 'changePassword']);

        Route::post('/{id}/avatar', [UserApiController::class, 'uploadAvatar']);

        Route::delete('/{id}', [UserApiController::class, 'destroy']);

        Route::put('/{id}', [UserApiController::class, 'update']);

        Route::get('/me', [UserApiController::class, 'me']);

        Route::get('/{id}', [UserApiController::class, 'show']);

        Route::get('/', [UserApiController::class, 'index']);
    });

    Route::prefix('blogs')->group(function () {
        Route::post('/{id}/image', [BlogApiController::class, 'uploadImage']);

        Route::delete('/{id}', [BlogApiController::class, 'destroy']);

        Route::put('/{id}', [BlogApiController::class, 'update']);

        Route::get('/{id}', [BlogApiController::class, 'show']);

        Route::post('/', [BlogApiController::class, 'create']);

        Route::get('/', [BlogApiController::class, 'index']);
    });

    Route::prefix('files')->group(function () {
        Route::post('/', [FileApiController::class, 'upload']);
    });

    Route::prefix('roles')->group(function () {
        Route::put('/{id}', [RoleApiController::class, 'update']);

        Route::get('/{id}', [RoleApiController::class, 'show']);

        Route::post('/', [RoleApiController::class, 'create']);

        Route::get('/', [RoleApiController::class, 'index']);
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionApiController::class, 'index']);
    });
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthApiController::class, 'login']);

    Route::post('/register', [AuthApiController::class, 'register']);

    Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');
});
