<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\FileApiController;
use App\Http\Controllers\Api\AuthApiController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::patch('/{id}/password', [UserApiController::class, 'changePassword']);

        Route::post('/{id}/avatar', [UserApiController::class, 'uploadAvatar']);

        Route::delete('/{id}', [UserApiController::class, 'destroy']);

        Route::put('/{id}', [UserApiController::class, 'update']);

        Route::get('/', [UserApiController::class, 'index']);
    });

    Route::prefix('blogs')->group(function () {
        Route::post('/{id}/image', [BlogApiController::class, 'uploadImage']);

        Route::delete('/{id}', [BlogApiController::class, 'destroy']);

        Route::put('/{id}', [BlogApiController::class, 'update']);

        Route::post('/', [BlogApiController::class, 'create']);

        Route::get('/', [BlogApiController::class, 'index']);
    });

    Route::prefix('files')->group(function () {
        Route::post('/', [FileApiController::class, 'upload']);
    });
});

Route::post('/login', [AuthApiController::class, 'login']);

Route::post('/register', [AuthApiController::class, 'register']);
