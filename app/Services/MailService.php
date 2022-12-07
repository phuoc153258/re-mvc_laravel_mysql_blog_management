<?php

namespace App\Services;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\Jobs\WelcomeMailJob;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function __construct()
    {
    }

    public function welcome(WelcomeMailRequestDTO $mailRequest)
    {
        $sendEmailJob = new WelcomeMailJob($mailRequest);
        dispatch($sendEmailJob);
        return MESSAGE_SUCCESS_PLEASE_CHECK_MAIL;
    }
}
