<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/{id}/password', [UserController::class, 'changePassword']);

        Route::get('/{id}', [UserController::class, 'show']);

        Route::get('', [UserController::class, 'index']);
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/create', [BlogController::class, 'create']);

        Route::get('/{id}', [BlogController::class, 'show']);

        Route::get('', [BlogController::class, 'index']);
    });
});

Route::get('/auth/login', [AuthController::class, 'login']);

Route::get('/auth/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
