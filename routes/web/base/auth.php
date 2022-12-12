<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\AuthController;

Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);

Route::get('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'register']);
