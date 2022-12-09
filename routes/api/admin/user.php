<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\UserApiController;
use App\Http\Controllers\Admin\Api\PermissionApiController;
use App\Http\Controllers\Admin\Api\RoleApiController;

Route::post('/{user_id}/roles/{role_id}', [RoleApiController::class, 'assignRole'])->middleware('permission:admin-assign-role');

Route::delete('/{user_id}/roles/{role_id}', [RoleApiController::class, 'removeRole'])->middleware('permission:admin-remove-role');

Route::post('/{user_id}/permissions/{permission_id}', [PermissionApiController::class, 'givePermission'])->middleware('permission:admin-give-permission');

Route::delete('/{user_id}/permissions/{permission_id}', [PermissionApiController::class, 'revokePermission'])->middleware('permission:admin-revoke-permission');

Route::patch('/{id}/password', [UserApiController::class, 'resetPassword'])->middleware('permission:admin-reset-password');

Route::post('/{id}/avatar', [UserApiController::class, 'uploadAvatar'])->middleware('permission:admin-update-user');

Route::delete('/{id}', [UserApiController::class, 'destroy'])->middleware('permission:admin-delete-user');

Route::put('/{id}', [UserApiController::class, 'update'])->middleware('permission:admin-update-user');

Route::get('/{id}', [UserApiController::class, 'show'])->middleware('permission:admin-get-user');

Route::get('/', [UserApiController::class, 'index'])->middleware('permission:admin-get-user-list');
