<?php

namespace App\Validate;

use Illuminate\Support\Facades\Validator;

class RoleValidate
{
    public function validateInfoIdRole($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => VALIDATE_ID_MYSQL,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
    }
}
