<?php

namespace App\Services\Role;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Role\UpdateRoleRequestDTO;
use App\DTO\Request\Role\AssignRoleUserRequestDTO;
use App\DTO\Response\Role\RoleResponseDTO;
use App\DTO\Response\User\UserResponseDTO;

interface IRoleService
{
    public function getList(BasePaginateRequestDTO $option): mixed;

    public function show(int $id): RoleResponseDTO;

    public function create(string $name): RoleResponseDTO;

    public function update(UpdateRoleRequestDTO $roleRequest): RoleResponseDTO;

    public function delete(int $id): RoleResponseDTO;

    public function assignRole(AssignRoleUserRequestDTO $userRequest): UserResponseDTO;

    public function removeRole(AssignRoleUserRequestDTO $userRequest): UserResponseDTO;
}
