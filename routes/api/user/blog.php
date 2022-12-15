<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\BlogApiController;

Route::get('/views', [BlogApiController::class, 'viewBlogs']);

Route::get('/views/{id}', [BlogApiController::class, 'viewDetailBlog']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/{id}/image', [BlogApiController::class, 'uploadImage'])->middleware('permission:user-update-my-blog');

    Route::delete('/{id}', [BlogApiController::class, 'destroy'])->middleware('permission:user-delete-my-blog');

    Route::put('/{id}', [BlogApiController::class, 'update'])->middleware('permission:user-update-my-blog');

    Route::get('/{id}', [BlogApiController::class, 'show'])->middleware('permission:user-get-my-blog');

    Route::post('/', [BlogApiController::class, 'create'])->middleware('permission:user-create-my-blog');

    Route::get('/', [BlogApiController::class, 'index'])->middleware('permission:user-get-my-blog-list');
});
