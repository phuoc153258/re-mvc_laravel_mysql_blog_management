<?php

namespace App\Validate;

use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

class RoleValidate
{
    use BaseValidate;

    public function validateInfoIdRole($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => VALIDATE_ID_MYSQL,
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoNameRole(string $name)
    {
        $validator = Validator::make(['name' => $name], [
            'name' => VALIDATE_ROLE_NAME,
        ]);
        return $this->baseRunCondition($validator);
    }
}
