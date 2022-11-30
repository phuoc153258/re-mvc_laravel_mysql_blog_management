<?php

namespace App\Services;

use App\Models\User;
use App\DTO\request\BasePaginateRequestDTO;
use App\DTO\request\UpdateUserRequestDTO;
use App\DTO\request\ChangePasswordUserRequestDTO;
use App\DTO\request\UploadFileRequestDTO;
use App\DTO\response\UserResponseDTO;
use App\Services\PaginateService;
use App\Services\FileService;

class UserService
{
    protected PaginateService $paginateService;
    protected FileService $fileService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
        $this->fileService = new FileService();
    }

    public  function getList(BasePaginateRequestDTO $option)
    {
        $data = (new PaginateService())->paginate($option);
        return $data;
    }

    public  function show($id)
    {
        $user = User::find($id);
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public  function update(UpdateUserRequestDTO $request)
    {
        $user = User::find($request->getID());

        if ($user->fullname != $request->getFullname() && $request->getFullname() != '')
            $user->fullname = $request->getFullname();

        if ($user->email != $request->getEmail() && $request->getEmail() != '')
            $user->email = $request->getEmail();

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public  function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public  function changePassword(ChangePasswordUserRequestDTO $request)
    {
        $user = User::find($request->getID());

        if (!checkPasswordHash($request->getOldPassword(), $user->password))
            abort(400, 'Old password is not correct !!!');

        $user->password = hashPassword($request->getNewPassword());

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public function uploadAvatar(UploadFileRequestDTO $file, string $id)
    {
        $user = User::find($id);

        if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        $fileResponse = $this->fileService->upload($file);
        $user->avatar = $fileResponse;

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }
}
