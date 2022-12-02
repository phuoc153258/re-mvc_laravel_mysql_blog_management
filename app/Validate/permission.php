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
        return $this->baseRunCondition($validator);
    }
}
