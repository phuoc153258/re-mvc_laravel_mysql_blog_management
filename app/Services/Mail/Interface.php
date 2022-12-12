<?php

namespace App\Services\Mail;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\DTO\Response\User\UserResponseDTO;

interface IMailService
{
    public function welcome(WelcomeMailRequestDTO $mailRequest): string;

    public function verifyMail(mixed $user): string;

    public function handleVerifyMail(int $user_id): UserResponseDTO;
}
