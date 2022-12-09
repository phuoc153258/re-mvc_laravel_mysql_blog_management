<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\BlogApiController;

Route::post('/{id}/image', [BlogApiController::class, 'uploadImage'])->middleware('permission:admin-update-blog');

Route::delete('/{id}', [BlogApiController::class, 'destroy'])->middleware('permission:admin-delete-blog');

Route::put('/{id}', [BlogApiController::class, 'update'])->middleware('permission:admin-update-blog');

Route::get('/{id}', [BlogApiController::class, 'show'])->middleware('permission:admin-get-blog');

Route::post('/', [BlogApiController::class, 'create'])->middleware('permission:admin-create-blog');

Route::get('/', [BlogApiController::class, 'index'])->middleware('permission:admin-get-blog-list');
