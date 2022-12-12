<?php

namespace App\Services\Permission;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Permission\GivePermissionUserRequestDTO;
use App\DTO\Request\Permission\UpdatePermissionRequestDTO;
use App\DTO\Response\Permission\PermissionResponseDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Services\Paginate\PaginateService;
use App\Services\Permission\IPermissionService;

class PermissionService implements IPermissionService
{
    protected PaginateService $paginateService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
    }

    public function getList(BasePaginateRequestDTO $option): mixed
    {
        $data = $this->paginateService->paginate($option);
        return $data;
    }

    public function show(int $id): PermissionResponseDTO
    {
        $permission = Permission::find($id);
        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO;
    }

    public function create(string $name): PermissionResponseDTO
    {
        $permission = new Permission();

        if ($name == '' || $name == null) return abort(400, trans('error.permission.create-permission'));

        $permission->name = $name;

        $permission->save();
        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO;
    }

    public function update(UpdatePermissionRequestDTO $permissionRequest): PermissionResponseDTO
    {
        $permission = Permission::find($permissionRequest->getID());
        if ($permissionRequest->getName() == '' || $permissionRequest->getName() == null) return abort(400, trans('error.permission.update-permission'));

        $permission->name = $permissionRequest->getName();
        $permission->save();

        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO;
    }

    public function delete(int $id): PermissionResponseDTO
    {
        $permission = Permission::find($id);
        $permission->delete();

        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO;
    }

    public function givePermission(GivePermissionUserRequestDTO $permissionRequest): UserResponseDTO
    {
        $user = User::find($permissionRequest->getUserID());

        if (!$user) return abort(400, trans('error.user.user-not-found'));

        if ($user->hasAnyPermission($permissionRequest->getPermissionID())) return abort(400, trans('error.permission.give-permission-exists'));

        $user->givePermissionTo([$permissionRequest->getPermissionID()]);

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }

    public function revokePermission(GivePermissionUserRequestDTO $permissionRequest): UserResponseDTO
    {
        $user = User::find($permissionRequest->getUserID());

        if (!$user) return abort(400, trans('error.user.user-not-found'));

        if (!$user->hasPermissionTo($permissionRequest->getPermissionID())) return abort(400, trans('error.permission.revoke-permission-not-exists'));

        $user->revokePermissionTo($permissionRequest->getPermissionID());

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }
}
