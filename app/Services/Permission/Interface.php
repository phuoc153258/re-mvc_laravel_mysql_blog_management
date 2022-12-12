<?php

namespace App\Services\Permission;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Permission\GivePermissionUserRequestDTO;
use App\DTO\Request\Permission\UpdatePermissionRequestDTO;
use App\DTO\Response\Permission\PermissionResponseDTO;
use App\DTO\Response\User\UserResponseDTO;

interface IPermissionService
{
    public function getList(BasePaginateRequestDTO $option): mixed;

    public function show(int $id): PermissionResponseDTO;

    public function create(string $name): PermissionResponseDTO;

    public function update(UpdatePermissionRequestDTO $permissionRequest): PermissionResponseDTO;

    public function delete(int $id): PermissionResponseDTO;

    public function givePermission(GivePermissionUserRequestDTO $permissionRequest): UserResponseDTO;

    public function revokePermission(GivePermissionUserRequestDTO $permissionRequest): UserResponseDTO;
}
