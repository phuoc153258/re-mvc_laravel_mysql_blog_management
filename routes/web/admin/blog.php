<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;

Route::get('/create', [BlogController::class, 'create']);

Route::get('/{id}', [BlogController::class, 'show']);

Route::get('/', [BlogController::class, 'index']);
