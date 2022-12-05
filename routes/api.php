<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\UserApiController;
use App\Http\Controllers\Admin\Api\BlogApiController;
use App\Http\Controllers\Admin\Api\PermissionApiController;
use App\Http\Controllers\Admin\Api\RoleApiController;
use App\Http\Controllers\Base\Api\FileApiController;
use App\Http\Controllers\Base\Api\AuthApiController;


// Route::middleware(['auth:sanctum'])->group(function () {

//     Route::prefix('users')->middleware('role:admin|user')->group(function () {
//         Route::post('/{user_id}/roles/{role_id}', [RoleApiController::class, 'assignRole'])->middleware('role:admin');

//         Route::delete('/{user_id}/roles/{role_id}', [RoleApiController::class, 'removeRole'])->middleware('role:admin');

//         Route::post('/{user_id}/permissions/{permission_id}', [PermissionApiController::class, 'givePermission'])->middleware('role:admin');

//         Route::delete('/{user_id}/permissions/{permission_id}', [PermissionApiController::class, 'revokePermission'])->middleware('role:admin');

//         Route::patch('/{id}/password', [UserApiController::class, 'changePassword'])->middleware('permission:change-password-user');

//         Route::post('/{id}/avatar', [UserApiController::class, 'uploadAvatar'])->middleware('permission:update-user');

//         Route::delete('/{id}', [UserApiController::class, 'destroy'])->middleware('permission:delete-user');

//         Route::put('/{id}', [UserApiController::class, 'update'])->middleware('permission:update-user');


//         Route::get('/{id}', [UserApiController::class, 'show'])->middleware('permission:get-user');

//         Route::get('/', [UserApiController::class, 'index'])->middleware('permission:get-list-user');
//     });

//     Route::prefix('blogs')->middleware('role:admin|user')->group(function () {
//         Route::post('/{id}/image', [BlogApiController::class, 'uploadImage'])->middleware('permission:upload-image-blog');

//         Route::delete('/{id}', [BlogApiController::class, 'destroy'])->middleware('permission:delete-blog');

//         Route::put('/{id}', [BlogApiController::class, 'update'])->middleware('permission:update-blog');

//         Route::get('/{id}', [BlogApiController::class, 'show'])->middleware('permission:get-blog');

//         Route::post('/', [BlogApiController::class, 'create'])->middleware('permission:add-blog');

//         Route::get('/', [BlogApiController::class, 'index'])->middleware('permission:get-list-blog');
//     });


//     Route::middleware('role:admin')->group(function () {
//         Route::prefix('files')->group(function () {
//             Route::post('/', [FileApiController::class, 'upload']);

//             Route::delete('/', [FileApiController::class, 'delete']);
//         });

//         Route::prefix('roles')->group(function () {
//             Route::delete('/{id}', [RoleApiController::class, 'delete']);

//             Route::put('/{id}', [RoleApiController::class, 'update']);

//             Route::get('/{id}', [RoleApiController::class, 'show']);

//             Route::post('/', [RoleApiController::class, 'create']);

//             Route::get('/', [RoleApiController::class, 'index']);
//         });

//         Route::prefix('permissions')->group(function () {
//             Route::delete('/{id}', [PermissionApiController::class, 'delete']);

//             Route::put('/{id}', [PermissionApiController::class, 'update']);

//             Route::get('/{id}', [PermissionApiController::class, 'show']);

//             Route::post('/', [PermissionApiController::class, 'create']);

//             Route::get('/', [PermissionApiController::class, 'index']);
//         });
//     });

//     Route::prefix('/mails')->group(function () {
//         Route::post('/', [MailApiController::class, 'index']);
//     });
// });

Route::prefix('/admin')->middleware([])->group(function () {
});

Route::prefix('/user')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [\App\Http\Controllers\User\Api\UserApiController::class, 'me'])->middleware('permission:get-me');
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthApiController::class, 'login']);

    Route::post('/register', [AuthApiController::class, 'register']);

    Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');
});
