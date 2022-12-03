<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailApiController extends Controller
{
    public function index()
    {
        try {
            $name = "DSA";
            Mail::send('mails.hello', compact('name'), function ($email) {
                $email->to('nguyendonphuochusc@gmail.com', "test");
            });
            return 'OK';
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }
}
