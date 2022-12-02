<?php

namespace App\DTO\Request\Permission;

use Illuminate\Http\Request;

class GivePermissionUserRequestDTO
{
    private int $user_id;
    private int $permission_id;

    public function __construct($user_id, $permission_id)
    {
        $this->user_id = $user_id;
        $this->permission_id = $permission_id;
    }

    public function getUserID()
    {
        return $this->user_id;
    }

    public function getPermissionID()
    {
        return $this->permission_id;
    }

    public function toArray()
    {
        return [
            'user_id' => $this->user_id,
            'permission_id' => $this->permission_id,
        ];
    }
}
