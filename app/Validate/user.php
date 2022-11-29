<?php

namespace App\Validate;

use Illuminate\Support\Facades\Validator;
use App\DTO\request\UpdateUserRequestDTO;
use App\DTO\request\ChangePasswordUserRequestDTO;

class UserValidate
{
    public function validateInfoUserUpdate(UpdateUserRequestDTO $user)
    {
        $validator = Validator::make($user->getAll(), [
            'id' => VALIDATE_ID_MYSQL,
            'fullname' => VALIDATE_NAME,
            'email' => VALIDATE_EMAIL,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
    }

    public function validateInfoUserID($id)
    {
        $validator = Validator::make(["id" => $id], [
            'id' => VALIDATE_ID_MYSQL,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
    }

    public function validateInfoUserChangePassword(ChangePasswordUserRequestDTO $user)
    {
        $validator = Validator::make($user->getAll(), [
            'id' => VALIDATE_ID_MYSQL,
            'old_password' => VALIDATE_PASSWORD,
            'new_password' => VALIDATE_PASSWORD
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
    }
}
