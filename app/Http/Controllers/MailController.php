<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            "subject" => "Cambo Tutorial Mail",
            "body" => "Hello friends, Welcome to Cambo Tutorial Mail Delivery!"
        ];
        try {
            Mail::to('hamburger153258@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great! Successfully send in your mail']);
        } catch (Exception $e) {
            return response()->json(['Sorry! Please try again latter']);
        }
    }
}
