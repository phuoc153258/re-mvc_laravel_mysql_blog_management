<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\Api\MailApiController;

Route::get('/{email}', [MailApiController::class, 'welcome']);
