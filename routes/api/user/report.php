<?php

use App\Http\Controllers\User\Api\ReportApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReportApiController::class, 'getList']);
