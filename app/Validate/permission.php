<?php

namespace App\Validate;

use App\DTO\Request\Role\UpdateRoleRequestDTO;
use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

const validateId = ['id' => VALIDATE_ID_MYSQL];

const validateName = ['name' => VALIDATE_ROLE_NAME];

class PermissionValidate
{
    use BaseValidate;

    public function validateInfoIdRole($id)
    {
        $validator = Validator::make(['id' => $id], validateId);
        return $this->baseRunCondition($validator);
    }
}
