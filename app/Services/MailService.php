<?php

namespace App\Services;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function __construct()
    {
    }

    public function welcome(WelcomeMailRequestDTO $mailRequest)
    {
        Mail::to($mailRequest->getEmail())->send(new WelcomeMail(MAIL_WELCOME_USER));
        return MESSAGE_SUCCESS_PLEASE_CHECK_MAIL;
    }
}
