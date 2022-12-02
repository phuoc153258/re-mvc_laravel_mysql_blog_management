<?php

namespace App\Validate;

use App\DTO\Request\User\AssignRoleUserRequestDTO;
use Illuminate\Support\Facades\Validator;
use App\DTO\Request\User\UpdateUserRequestDTO;
use App\DTO\Request\User\ChangePasswordUserRequestDTO;
use App\Traits\BaseValidate;

class UserValidate
{
    use BaseValidate;

    public function validateInfoUserUpdate(UpdateUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            ...VALIDATE_ID_MYSQL, ...VALIDATE_FULLNAME, ...VALIDATE_EMAIL
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUserID($id)
    {
        $validator = Validator::make(["id" => $id], [
            ...VALIDATE_ID_MYSQL
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUserChangePassword(ChangePasswordUserRequestDTO $user)
    {
        $validator = Validator::make($user->toArray(), [
            ...VALIDATE_ID_MYSQL, ...VALIDATE_OLD_PASSWORD, ...VALIDATE_NEW_PASSWORD
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoAssignRoleUser(AssignRoleUserRequestDTO $userRequest)
    {
        $validator = Validator::make($userRequest->toArray(), [
            ...VALIDATE_USER_ID_MYSQL, ...VALIDATE_ROLE_ID_MYSQL,
        ]);
        return $this->baseRunCondition($validator);
    }
}
