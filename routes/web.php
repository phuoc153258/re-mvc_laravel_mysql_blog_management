<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->middleware('language');

Auth::routes();
