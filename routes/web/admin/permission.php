<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;

Route::get('/create', [PermissionController::class, 'create']);

Route::get('/{id}', [PermissionController::class, 'show']);

Route::get('/', [PermissionController::class, 'index']);
