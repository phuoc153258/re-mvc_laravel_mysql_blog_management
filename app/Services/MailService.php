<?php

namespace App\Services;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Jobs\VerifyMailJob;
use App\Jobs\WelcomeMailJob;
use App\Mail\WelcomeMail;
use App\Models\User;
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

    public function verifyMail($user)
    {
        $verifyMailJob = new VerifyMailJob($user);
        dispatch($verifyMailJob);
        return MESSAGE_SUCCESS_PLEASE_CHECK_MAIL;
    }

    public function handleVerifyMail($user_id)
    {
        $user = User::find($user_id);

        if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        $user->is_email_verified = MAIL_VERIFY_TRUE;
        $user->email_verified_at = getDateNow();

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }
}
