<?php

namespace App\Services;

use App\Models\User;
use App\DTO\request\RegisterUserRequestDTO;
use App\DTO\response\RegisterUserResponseDTO;

class AuthService
{
    public function __construct()
    {
    }

    public function register(RegisterUserRequestDTO $userRequest)
    {
        $user = User::create($userRequest->getAll());
        $userDTO = new RegisterUserResponseDTO(User::find($user->id));
        $token = $user->createToken('API Token')->plainTextToken;
        return [
            'user' => $userDTO->toJSON(),
            'token' => $token
        ];
    }
}
