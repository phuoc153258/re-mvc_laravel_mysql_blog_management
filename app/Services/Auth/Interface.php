<?php

namespace App\Services\Auth;

use App\DTO\Request\Auth\LoginUserRequestDTO;
use App\DTO\Request\Auth\RegisterUserRequestDTO;
use App\DTO\Response\Auth\AuthUserResponseDTO;
use App\Models\User;

interface IAuthService
{
    public function register(RegisterUserRequestDTO $userRequest): AuthUserResponseDTO;

    public function login(LoginUserRequestDTO $userRequest): AuthUserResponseDTO;

    public function logout(mixed $user): string;
}
