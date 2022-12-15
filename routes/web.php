<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\BlogController;

Route::middleware('language')->group(function () {
    Route::get('/details/{id}', [BlogController::class, 'viewDetail']);

    Route::get('/', [BlogController::class, 'views']);
});

Route::get('/about', function () {
    return view('welcome');
})->middleware('language');

Auth::routes();
