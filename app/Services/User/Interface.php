<?php

namespace App\Services\User;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\User\UpdateUserRequestDTO;
use App\DTO\Request\User\ChangePasswordUserRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Response\User\UserResponseDTO;

interface IUserService
{
    public function getList(BasePaginateRequestDTO $option): mixed;

    public function show(int $id): UserResponseDTO;

    public function update(UpdateUserRequestDTO $request): UserResponseDTO;

    public  function changePassword(ChangePasswordUserRequestDTO $request): UserResponseDTO;

    public function resetPassword(int $id): UserResponseDTO;

    public function uploadAvatar(UploadFileRequestDTO $file, int $id): UserResponseDTO;

    public function deleteUser(int $id): UserResponseDTO;
}
