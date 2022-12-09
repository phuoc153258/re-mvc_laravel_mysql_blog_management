<?php

use Illuminate\Support\Facades\Route;

Route::get('/create', [\App\Http\Controllers\User\BlogController::class, 'create']);

Route::get('/{id}', [\App\Http\Controllers\User\BlogController::class, 'show']);

Route::get('', [\App\Http\Controllers\User\BlogController::class, 'index']);
