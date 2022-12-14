<?php

namespace App\Services\User;

use App\DTO\Request\File\DeleteFileRequestDTO;
use App\Models\User;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\User\UpdateUserRequestDTO;
use App\DTO\Request\User\ChangePasswordUserRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Services\Paginate\PaginateService;
use App\Services\File\FileService;
use App\Services\User\IUserService;

class UserService implements IUserService
{
    protected PaginateService $paginateService;
    protected FileService $fileService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
        $this->fileService = new FileService();
    }

    public  function getList(BasePaginateRequestDTO $option): mixed
    {
        $data = $this->paginateService->paginate($option);
        return $data;
    }

    public  function show(int $id): UserResponseDTO
    {
        $user = User::find($id);
        if (!$user)  abort(400, trans('error.user.user-not-found'));

        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }

    public function update(UpdateUserRequestDTO $request): UserResponseDTO
    {
        $user = User::find($request->getID());

        if ($user->fullname != $request->getFullname() && $request->getFullname() != '')
            $user->fullname = $request->getFullname();

        if ($user->email != $request->getEmail() && $request->getEmail() != '') {
            $user->email = $request->getEmail();
            $user->is_email_verified = 0;
            $user->email_verified_at = null;
        }

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }

    public function changePassword(ChangePasswordUserRequestDTO $request): UserResponseDTO
    {
        $user = User::find($request->getID());

        if (!checkPasswordHash($request->getOldPassword(), $user->password))
            abort(400, 'Old password is not correct !!!');

        $user->password = hashPassword($request->getNewPassword());

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }

    public function resetPassword(int $id): UserResponseDTO
    {
        $user = User::find($id);
        if (!$user)  abort(400, trans('error.user.user-not-found'));

        $user->password = USER_DEFAULT_PASSWORD;

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }

    public function uploadAvatar(UploadFileRequestDTO $file, int $id): UserResponseDTO
    {
        $user = User::find($id);

        if (!$user)  abort(400, trans('error.user.user-not-found'));

        $fileResponse = $this->fileService->upload($file);
        try {
            $fileDelete = new DeleteFileRequestDTO($user->avatar);
            $this->fileService->delete($fileDelete);
        } catch (\Throwable $th) {
        }

        $user->avatar = $fileResponse;

        $user->save();

        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }

    public function deleteUser($id): UserResponseDTO
    {
        $user = User::find($id);
        if (!$user)  abort(400, trans('error.user.user-not-found'));
        $user->delete();
        $userDTO = new UserResponseDTO($user);
        return $userDTO;
    }
}
