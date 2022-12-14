<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;

Route::get('/', [BlogController::class, 'index']);
