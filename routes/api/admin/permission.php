<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\PermissionApiController;

Route::delete('/{id}', [PermissionApiController::class, 'delete']);

Route::put('/{id}', [PermissionApiController::class, 'update']);

Route::get('/{id}', [PermissionApiController::class, 'show']);

Route::post('/', [PermissionApiController::class, 'create']);

Route::get('/', [PermissionApiController::class, 'index']);
