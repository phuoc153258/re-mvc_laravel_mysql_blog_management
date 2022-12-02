<?php

namespace App\Validate;

use App\DTO\Request\Auth\LoginUserRequestDTO;
use Illuminate\Support\Facades\Validator;
use App\DTO\Request\Auth\RegisterUserRequestDTO;
use App\Traits\BaseValidate;

class AuthValidate
{
    use BaseValidate;

    public function validateInfoRegisterUser(RegisterUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            ...VALIDATE_USERNAME, ...VALIDATE_FULLNAME, ...VALIDATE_EMAIL, ...VALIDATE_PASSWORD
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoLoginUser(LoginUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            ...VALIDATE_USERNAME, ...VALIDATE_PASSWORD
        ]);
        return $this->baseRunCondition($validator);
    }
}
