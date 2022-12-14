<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;

Route::get('/', [PermissionController::class, 'index']);
