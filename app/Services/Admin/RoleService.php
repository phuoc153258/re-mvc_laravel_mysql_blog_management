<?php

namespace App\Services\Admin;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Role\UpdateRoleRequestDTO;
use App\DTO\Request\Role\AssignRoleUserRequestDTO;
use App\DTO\Response\Role\RoleResponseDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Services\Base\PaginateService;

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

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();

        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO->toJSON();
    }

    public function assignRole(AssignRoleUserRequestDTO $userRequest)
    {
        $user = User::find($userRequest->getUserID());

        if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        if ($user->hasRole([$userRequest->getRoleID()])) return abort(400, MESSAGE_ERROR_ASSIGN_ROLE_EXIST);

        $user->assignRole([$userRequest->getRoleID()]);

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public function removeRole(AssignRoleUserRequestDTO $userRequest)
    {
        $user = User::find($userRequest->getUserID());

        if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        if (!$user->hasRole([$userRequest->getRoleID()])) return abort(400, MESSAGE_ERROR_REMOVE_ROLE_NOT_EXIST);
        if ($userRequest->getRoleID() == ROLE_USER_ID) return abort(400, MESSAGE_ERROR_CAN_NOT_DELETE_ROLE);

        $user->removeRole($userRequest->getRoleID());

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }
}
