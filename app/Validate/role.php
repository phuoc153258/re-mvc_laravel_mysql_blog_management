<?php

namespace App\Validate;

use App\DTO\Request\Role\UpdateRoleRequestDTO;
use App\DTO\Request\Role\AssignRoleUserRequestDTO;
use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

class RoleValidate
{
    use BaseValidate;

    public function validateInfoIdRole($id)
    {
        $validator = Validator::make(['id' => $id], [...VALIDATE_ID_MYSQL]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoNameRole(string $name)
    {
        $validator = Validator::make(['name' => $name], [...VALIDATE_NAME]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUpdateRole(UpdateRoleRequestDTO $roleRequest)
    {
        $validator = Validator::make($roleRequest->toArray(), [...VALIDATE_ID_MYSQL, ...VALIDATE_NAME]);
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
