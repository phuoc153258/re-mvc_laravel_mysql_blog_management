<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/{id}', [UserController::class, 'show']);

Route::get('', [UserController::class, 'index']);
