<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Role\UpdateRoleRequestDTO;
use App\DTO\Request\Role\AssignRoleUserRequestDTO;
use App\DTO\Response\Role\RoleResponseDTO;
use App\DTO\Response\User\UserResponseDTO;
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

        if ($name == '' || $name == null) return abort(400, trans('error.role.create-role'));

        $role->name = $name;

        $role->save();
        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO->toJSON();
    }

    public function update(UpdateRoleRequestDTO $roleRequest)
    {
        $role = Role::find($roleRequest->getID());
        if ($roleRequest->getName() == '' || $roleRequest->getName() == null) return abort(400, trans('error.role.update-role'));

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

        if (!$user) return abort(400, trans('error.user.user-not-found'));

        if ($user->hasRole([$userRequest->getRoleID()])) return abort(400, trans('error.role.assign-role-exists'));

        $user->assignRole([$userRequest->getRoleID()]);

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public function removeRole(AssignRoleUserRequestDTO $userRequest)
    {
        $user = User::find($userRequest->getUserID());

        if (!$user) return abort(400, trans('error.user.user-not-found'));

        if (!$user->hasRole([$userRequest->getRoleID()])) return abort(400, trans('error.role.remove-role-exists'));
        if ($userRequest->getRoleID() == ROLE_USER_ID) return abort(400, trans('error.role.can-not-delete-role'));

        $user->removeRole($userRequest->getRoleID());

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }
}
