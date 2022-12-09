<?php

namespace App\DTO\Response\Auth;

use App\DTO\Response\User\UserResponseDTO;

class AuthUserResponseDTO
{
    private UserResponseDTO $userDTO;
    private mixed $token;

    public function __construct(UserResponseDTO $userDTO, $token)
    {
        $this->userDTO = $userDTO;
        $this->token = $token;
    }

    public function toJSON()
    {
        return [
            'user' => $this->userDTO->toJSON(),
            'token' => $this->token
        ];
    }
}
