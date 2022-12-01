<?php

namespace App\Validate;

use Illuminate\Support\Facades\Validator;
use App\DTO\request\UpdateUserRequestDTO;
use App\DTO\request\ChangePasswordUserRequestDTO;
use App\Traits\BaseValidate;

class UserValidate
{
    use BaseValidate;

    public function validateInfoUserUpdate(UpdateUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            'id' => VALIDATE_ID_MYSQL,
            'fullname' => VALIDATE_NAME,
            'email' => VALIDATE_EMAIL,
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUserID($id)
    {
        $validator = Validator::make(["id" => $id], [
            'id' => VALIDATE_ID_MYSQL,
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUserChangePassword(ChangePasswordUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            'id' => VALIDATE_ID_MYSQL,
            'old_password' => VALIDATE_PASSWORD,
            'new_password' => VALIDATE_PASSWORD
        ]);
        return $this->baseRunCondition($validator);
    }
}
