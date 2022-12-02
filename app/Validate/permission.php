<?php

namespace App\Validate;

use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

class PermissionValidate
{
    use BaseValidate;

    public function validateInfoIdPermission($id)
    {
        $validator = Validator::make(['id' => $id], [...VALIDATE_ID_MYSQL]);
        $this->baseRunCondition($validator);
    }

    public function validateInfoNamePermission($name)
    {
        $validator = Validator::make(['name' => $name], [...VALIDATE_NAME]);
        $this->baseRunCondition($validator);
    }
}
