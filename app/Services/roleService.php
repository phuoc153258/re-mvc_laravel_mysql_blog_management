<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use App\DTO\response\RoleResponseDTO;
use App\DTO\request\BasePaginateRequestDTO;
use App\DTO\request\UpdateRoleRequestDTO;
use App\Services\PaginateService;

class RoleService
{
    protected PaginateService $paginateService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
    }

    public function getList(BasePaginateRequestDTO $option)
    {
        $data = $this->paginateService->paginate($option);
        return $data;
    }

    public function show($id)
    {
        $role = Role::find($id);
        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO->toJSON();
    }

    public function create(string $name)
    {
        $role = new Role();

        if ($name == '' || $name == null) return abort(400, MESSAGE_ERROR_CREATE_ROLE);

        $role->name = $name;

        $role->save();
        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO->toJSON();
    }

    public function update(UpdateRoleRequestDTO $roleRequest)
    {
        $role = Role::find($roleRequest->getID());
        if ($roleRequest->getName() == '' || $roleRequest->getName() == null) return abort(400, MESSAGE_ERROR_UPDATE_ROLE);

        $role->name = $roleRequest->getName();
        $role->save();

        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO->toJSON();
    }
}
