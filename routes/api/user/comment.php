<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\CommentApiController;

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/{comment_id}/rates/{rate_id}', [CommentApiController::class, 'rateComment']);

    Route::post('/{comment_id}/users/{user_id}', [CommentApiController::class, 'likeComment']);

    Route::get('/{comment_id}/rates', [CommentApiController::class, 'getListRateComment']);

    Route::post('/{comment_id}/reports', [CommentApiController::class, 'createReportComment']);

    Route::delete('/{comment_id}', [CommentApiController::class, 'deleteComment']);
});
