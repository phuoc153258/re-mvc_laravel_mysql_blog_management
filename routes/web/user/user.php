<?php

use Illuminate\Support\Facades\Route;

Route::get('/password', [\App\Http\Controllers\User\UserController::class, 'changePassword']);

Route::get('/{id}/mails/token/{token}', [\App\Http\Controllers\User\UserController::class, 'verifyEmail']);

Route::get('/', [\App\Http\Controllers\User\UserController::class, 'index']);
