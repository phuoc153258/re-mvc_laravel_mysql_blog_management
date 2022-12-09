<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\Api\FileApiController;

Route::post('/', [FileApiController::class, 'upload']);

Route::delete('/', [FileApiController::class, 'delete']);
