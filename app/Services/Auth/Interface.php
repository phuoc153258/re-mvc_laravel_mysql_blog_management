<?php

namespace App\Services\Auth;

use App\DTO\Request\Auth\LoginUserRequestDTO;
use App\DTO\Request\Auth\RegisterUserRequestDTO;
use App\DTO\Request\Auth\ResetPasswordUserRequestDTO;
use App\DTO\Request\Auth\VerifyOTPRequestDTO;
use App\DTO\Response\Auth\AuthUserResponseDTO;
use App\DTO\Response\User\UserResponseDTO;

interface IAuthService
{
    public function register(RegisterUserRequestDTO $userRequest): AuthUserResponseDTO;

    public function login(LoginUserRequestDTO $userRequest): AuthUserResponseDTO;

    public function logout(mixed $user): string;

    public function sendMail(string $email): string;

    public function verifyOTP(VerifyOTPRequestDTO $userRequest): mixed;

    public function resetPassword(ResetPasswordUserRequestDTO $userRequest): UserResponseDTO;
}
