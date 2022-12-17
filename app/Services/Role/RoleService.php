<?php

namespace App\Services\Role;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Role\UpdateRoleRequestDTO;
use App\DTO\Request\Role\AssignRoleUserRequestDTO;
use App\DTO\Response\Role\RoleResponseDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Services\Paginate\PaginateService;
use App\Services\Role\IRoleService;
use Illuminate\Support\Facades\DB;

class RoleService implements IRoleService
{
    protected PaginateService $paginateService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
    }

    public function getList(BasePaginateRequestDTO $option): mixed
    {
        $query =  DB::table($option->type_model->getType());

        $data = $this->paginateService->paginate($option, $query);
        $data['data']  = $data['data']->select($option->type_model->getSelectIem())->get();
        return $data;
    }

    public function show(int $id): RoleResponseDTO
    {
        $role = Role::find($id);
        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO;
    }

    public function create(string $name): RoleResponseDTO
    {
        $role = new Role();

        if ($name == '' || $name == null)  abort(400, trans('error.role.create-role'));

        $role->name = $name;

        $role->save();
        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO;
    }

    public function update(UpdateRoleRequestDTO $roleRequest): RoleResponseDTO
    {
        $role = Role::find($roleRequest->getID());
        if ($roleRequest->getName() == '' || $roleRequest->getName() == null)  abort(400, trans('error.role.update-role'));

        $role->name = $roleRequest->getName();
        $role->save();

        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO;
    }

    public function delete(int $id): RoleResponseDTO
    {
        $role = Role::find($id);
        $role->delete();

        $roleDTO = new RoleResponseDTO($role);
        return $roleDTO;
    }

    public function assignRole(AssignRoleUserRequestDTO $userRequest): UserResponseDTO
    {
        $user = User::find($userRequest->getUserID());

        if (!$user)  abort(400, trans('error.user.user-not-found'));

        if ($user->hasRole([$userRequest->getRoleID()]))  abort(400, trans('error.role.assign-role-exists'));

        $user->assignRole([$userRequest->getRoleID()]);

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }

    public function removeRole(AssignRoleUserRequestDTO $userRequest): UserResponseDTO
    {
        $user = User::find($userRequest->getUserID());

        if (!$user)  abort(400, trans('error.user.user-not-found'));

        if (!$user->hasRole([$userRequest->getRoleID()]))  abort(400, trans('error.role.remove-role-exists'));
        if ($userRequest->getRoleID() == ROLE_USER_ID)  abort(400, trans('error.role.can-not-delete-role'));

        $user->removeRole($userRequest->getRoleID());

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }
}
