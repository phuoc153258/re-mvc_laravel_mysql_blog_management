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
        return trans('success.mail.please-check-mail');
    }

    public function verifyMail($user)
    {
        $verifyMailJob = new VerifyMailJob($user);
        dispatch($verifyMailJob);
        return trans('success.mail.please-check-mail');
    }

    public function handleVerifyMail($user_id)
    {
        $user = User::find($user_id);

        if (!$user) return abort(400, trans('error.user.user-not-found'));

        $user->is_email_verified = MAIL_VERIFY_TRUE;
        $user->email_verified_at = getDateNow();

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }
}
