<?php

namespace App\Validate;

use App\DTO\Request\Role\UpdateRoleRequestDTO;
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
}
