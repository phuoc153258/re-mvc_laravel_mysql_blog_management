<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\Api\MailApiController;
use App\Http\Controllers\User\Api\UserApiController;

Route::post('/verify-mail/handle', [MailApiController::class, 'handleVerifyMail'])->middleware('permission:user-update-profile');

Route::post('/verify-mail', [MailApiController::class, 'verifyMail'])->middleware('permission:user-update-profile');

Route::patch('/password', [UserApiController::class, 'changePassword'])->middleware('permission:user-change-password');

Route::post('/avatar', [UserApiController::class, 'uploadAvatar'])->middleware('permission:user-update-profile');

Route::put('/', [UserApiController::class, 'update'])->middleware('permission:user-update-profile');

Route::get('/', [UserApiController::class, 'me'])->middleware('permission:user-get-me');
