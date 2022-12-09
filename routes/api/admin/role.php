<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\RoleApiController;

Route::delete('/{id}', [RoleApiController::class, 'delete']);

Route::put('/{id}', [RoleApiController::class, 'update']);

Route::get('/{id}', [RoleApiController::class, 'show']);

Route::post('/', [RoleApiController::class, 'create']);

Route::get('/', [RoleApiController::class, 'index']);
