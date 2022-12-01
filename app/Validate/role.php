<?php

namespace App\Validate;

use App\DTO\request\UpdateRoleRequestDTO;
use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

const validateId = ['id' => VALIDATE_ID_MYSQL];

const validateName = ['name' => VALIDATE_ROLE_NAME];

class RoleValidate
{
    use BaseValidate;

    public function validateInfoIdRole($id)
    {
        $validator = Validator::make(['id' => $id], validateId);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoNameRole(string $name)
    {
        $validator = Validator::make(['name' => $name], validateName);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUpdateRole(UpdateRoleRequestDTO $roleRequest)
    {
        $validator = Validator::make($roleRequest->toArray(), [...validateId, ...validateName]);
        return $this->baseRunCondition($validator);
    }
}
