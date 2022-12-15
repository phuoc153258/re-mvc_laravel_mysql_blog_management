<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;

Route::get('/views/{id}', [BlogController::class, 'viewDetail']);

Route::get('/views', [BlogController::class, 'views']);

Route::get('', [BlogController::class, 'index']);
