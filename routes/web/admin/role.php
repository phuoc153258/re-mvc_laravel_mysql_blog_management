<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;

Route::get('/create', [RoleController::class, 'create']);

Route::get('/{id}', [RoleController::class, 'show']);

Route::get('/', [RoleController::class, 'index']);
