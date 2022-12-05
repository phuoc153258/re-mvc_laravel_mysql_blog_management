<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Base\AuthController;
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

// Route::prefix('admin')->group(function () {
//     Route::prefix('users')->group(function () {
//         Route::get('/{id}/password', [UserController::class, 'changePassword']);

//         Route::get('/{id}', [UserController::class, 'show']);

//         Route::get('', [UserController::class, 'index']);
//     });

//     Route::prefix('blogs')->group(function () {
//         Route::get('/create', [BlogController::class, 'createAdmin']);

//         Route::get('/{id}', [BlogController::class, 'showAdmin']);

//         Route::get('', [BlogController::class, 'indexAdmin']);
//     });
// });

// Route::prefix('users')->group(function () {
//     Route::get('/{id}/password', [UserController::class, 'changePassword']);

//     Route::get('/{id}', [UserController::class, 'show']);
// });

Route::prefix('blogs')->group(function () {
    Route::get('/create', [\App\Http\Controllers\User\BlogController::class, 'create']);

    Route::get('/{id}', [\App\Http\Controllers\User\BlogController::class, 'show']);

    Route::get('', [\App\Http\Controllers\User\BlogController::class, 'index']);
});


Route::prefix('auth')->group(function () {

    Route::get('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'register']);
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
