<?php

namespace App\Validate;

use App\DTO\Request\Permission\GivePermissionUserRequestDTO;
use App\DTO\Request\Permission\UpdatePermissionRequestDTO;
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

    public function validateInfoUpdatePermission(UpdatePermissionRequestDTO $permissionRequest)
    {
        $validator = Validator::make($permissionRequest->toArray(), [...VALIDATE_ID_MYSQL, ...VALIDATE_NAME]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoGivePermission(GivePermissionUserRequestDTO $permissionRequest)
    {
        $validator = Validator::make($permissionRequest->toArray(), [...VALIDATE_USER_ID_MYSQL, ...VALIDATE_PERMISSION_ID_MYSQL]);
        return $this->baseRunCondition($validator);
    }
}
