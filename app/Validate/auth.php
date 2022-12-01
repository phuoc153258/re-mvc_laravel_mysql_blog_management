<?php

namespace App\Validate;

use App\DTO\request\LoginUserRequestDTO;
use Illuminate\Support\Facades\Validator;
use App\DTO\request\RegisterUserRequestDTO;
use App\Traits\BaseValidate;

class AuthValidate
{
    use BaseValidate;

    public function validateInfoRegisterUser(RegisterUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            'username' => VALIDATE_NAME,
            'fullname' => VALIDATE_NAME,
            'email' => VALIDATE_EMAIL,
            'password' => VALIDATE_PASSWORD,
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoLoginUser(LoginUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            'username' => VALIDATE_NAME,
            'password' => VALIDATE_PASSWORD,
        ]);
        return $this->baseRunCondition($validator);
    }
}
