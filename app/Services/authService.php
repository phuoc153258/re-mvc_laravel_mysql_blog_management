<?php

namespace App\Services;

use App\DTO\request\LoginUserRequestDTO;
use App\Models\User;
use App\DTO\request\RegisterUserRequestDTO;
use App\DTO\response\UserResponseDTO;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct()
    {
    }

    public function register(RegisterUserRequestDTO $userRequest)
    {
        $user = User::create($userRequest->getAll());
        $userDTO = new UserResponseDTO(User::find($user->id));
        $token = $user->createToken('API Token')->plainTextToken;
        return [
            'user' => $userDTO->toJSON(),
            'token' => $token
        ];
    }

    public function login(LoginUserRequestDTO $userRequest)
    {
        if (!Auth::attempt($userRequest->getAll())) return abort(401, MESSAGE_ERROR_LOGIN_USER);

        $user = User::where('username', $userRequest->getUsername())->first();
        $userDTO = new UserResponseDTO($user);
        $token = $user->createToken('API Token')->plainTextToken;
        return [
            'user' => $userDTO->toJSON(),
            'token' => $token
        ];
    }
}
