<?php

namespace App\Validate;

use App\DTO\request\LoginUserRequestDTO;
use Illuminate\Support\Facades\Validator;
use App\DTO\request\RegisterUserRequestDTO;

class AuthValidate
{
    public function validateInfoRegisterUser(RegisterUserRequestDTO $user)
    {
        $validator = Validator::make($user->getAll(), [
            'username' => VALIDATE_NAME,
            'fullname' => VALIDATE_NAME,
            'email' => VALIDATE_EMAIL,
            'password' => VALIDATE_PASSWORD,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
        return $validator;
    }

    public function validateInfoLoginUser(LoginUserRequestDTO $user)
    {
        $validator = Validator::make($user->getAll(), [
            'username' => VALIDATE_NAME,
            'password' => VALIDATE_PASSWORD,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
        return $validator;
    }
}
