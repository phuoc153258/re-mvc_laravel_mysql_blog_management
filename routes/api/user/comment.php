<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\CommentApiController;

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/{comment_id}/rates/{rate_id}', [CommentApiController::class, 'rateComment']);

    Route::post('/{comment_id}/users/{user_id}', [CommentApiController::class, 'likeComment']);
});
