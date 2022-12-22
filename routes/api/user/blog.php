<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\BlogApiController;
use App\Http\Controllers\User\Api\CommentApiController;

Route::get('/views/{slug}/comments', [CommentApiController::class, 'getListComment']);

Route::get('/views/{slug}', [BlogApiController::class, 'viewDetailBlog']);

Route::get('/views', [BlogApiController::class, 'viewBlogs']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/views/{slug}/comments', [CommentApiController::class, 'createComment']);

    Route::post('/{id}/image', [BlogApiController::class, 'uploadImage'])->middleware('permission:user-update-my-blog');

    Route::delete('/{id}', [BlogApiController::class, 'destroy'])->middleware('permission:user-delete-my-blog');

    Route::put('/{id}', [BlogApiController::class, 'update'])->middleware('permission:user-update-my-blog');

    Route::get('/{id}', [BlogApiController::class, 'show'])->middleware('permission:user-get-my-blog');

    Route::post('/', [BlogApiController::class, 'create'])->middleware('permission:user-create-my-blog');

    Route::get('/', [BlogApiController::class, 'index'])->middleware('permission:user-get-my-blog-list');
});
