<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{

    public function __construct()
    {
    }

    public  function getList()
    {
        $roles = Role::all();
        return $roles;
    }
}
