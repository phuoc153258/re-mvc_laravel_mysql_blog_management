<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->middleware('language');

Route::get('/test', function () {
    return view('test');
});

Auth::routes();
