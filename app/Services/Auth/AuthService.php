<?php

namespace App\Services\Auth;

use App\DTO\Request\Auth\LoginUserRequestDTO;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\DTO\Request\Auth\RegisterUserRequestDTO;
use App\DTO\Response\Auth\AuthUserResponseDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Services\Auth\IAuthService;

class AuthService implements IAuthService
{
    public function __construct()
    {
    }

    public function register(RegisterUserRequestDTO $userRequest): AuthUserResponseDTO
    {
        $user = User::create($userRequest->toArray());
        $token = $user->createToken('API Token')->plainTextToken;
        $user->assignRole([ROLE_USER_ID])->givePermissionTo(PERMISSION_REGISTER_USER_DEFAULT);
        $user->save();
        $userDTO = new UserResponseDTO(User::find($user->id));
        return new AuthUserResponseDTO($userDTO, $token);
    }

    public function login(LoginUserRequestDTO $userRequest): AuthUserResponseDTO
    {
        if (!Auth::attempt($userRequest->toArray())) return abort(401, trans('error.auth.login-user'));

        $user = User::where('username', $userRequest->getUsername())->first();
        $userDTO = new UserResponseDTO($user);
        $token = $user->createToken('API Token')->plainTextToken;
        return new AuthUserResponseDTO($userDTO, $token);
    }

    public function logout(mixed $user): string
    {
        $user->currentAccessToken()->delete();
        return trans('success.auth.logout-user');
    }
}
