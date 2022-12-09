<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\Api\AuthApiController;

Route::post('/login', [AuthApiController::class, 'login']);

Route::post('/register', [AuthApiController::class, 'register']);

Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');
