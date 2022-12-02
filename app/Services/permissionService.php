<?php

namespace App\Services;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Permission\UpdatePermissionRequestDTO;
use App\DTO\Response\Permission\PermissionResponseDTO;
use Spatie\Permission\Models\Permission;

class PermissionService
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
        $permission = Permission::find($id);
        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO->toJSON();
    }

    public function create(string $name)
    {
        $permission = new Permission();

        if ($name == '' || $name == null) return abort(400, MESSAGE_ERROR_CREATE_PERMISSION);

        $permission->name = $name;

        $permission->save();
        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO->toJSON();
    }

    public function update(UpdatePermissionRequestDTO $permissionRequest)
    {
        $permission = Permission::find($permissionRequest->getID());
        if ($permissionRequest->getName() == '' || $permissionRequest->getName() == null) return abort(400, MESSAGE_ERROR_UPDATE_PERMISSION);

        $permission->name = $permissionRequest->getName();
        $permission->save();

        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO->toJSON();
    }

    public function delete()
    {
    }
}
