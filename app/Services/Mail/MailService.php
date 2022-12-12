<?php

namespace App\Services\Mail;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Jobs\VerifyMailJob;
use App\Jobs\WelcomeMailJob;
use App\Models\User;
use App\Services\Mail\IMailService;

class MailService implements IMailService
{
    public function __construct()
    {
    }

    public function welcome(WelcomeMailRequestDTO $mailRequest): string
    {
        $sendEmailJob = new WelcomeMailJob($mailRequest);
        dispatch($sendEmailJob);
        return trans('success.mail.please-check-mail');
    }

    public function verifyMail($user): string
    {
        $verifyMailJob = new VerifyMailJob($user);
        dispatch($verifyMailJob);
        return trans('success.mail.please-check-mail');
    }

    public function handleVerifyMail($user_id): UserResponseDTO
    {
        $user = User::find($user_id);

        if (!$user)  abort(400, trans('error.user.user-not-found'));

        $user->is_email_verified = MAIL_VERIFY_TRUE;
        $user->email_verified_at = getDateNow();

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }
}
