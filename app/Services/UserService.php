<?php

namespace App\Services;

use App\DTO\Request\File\DeleteFileRequestDTO;
use App\Models\User;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\User\UpdateUserRequestDTO;
use App\DTO\Request\User\ChangePasswordUserRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Response\User\UserResponseDTO;
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
        $data = $this->paginateService->paginate($option);
        return $data;
    }

    public  function show($id)
    {
        $user = User::find($id);

        if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public function me($id)
    {
        $user = User::find($id);

        if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public  function update(UpdateUserRequestDTO $request)
    {

        // $user = User::find($request->getID());

        // if ($user->fullname != $request->getFullname() && $request->getFullname() != '')
        //     $user->fullname = $request->getFullname();

        // if ($user->email != $request->getEmail() && $request->getEmail() != '')
        //     $user->email = $request->getEmail();

        // $user->save();
        // $userDTO = new UserResponseDTO($user);
        // return $userDTO->toJSON();

        $user = User::find($request->getID());

        if ($user->fullname != $request->getFullname() && $request->getFullname() != '')
            $user->fullname = $request->getFullname();

        if ($user->email != $request->getEmail() && $request->getEmail() != '')
            $user->email = $request->getEmail();

        $user->save();
        $userDTO = new UserResponseDTO($user);
        return $userDTO->toJSON();
    }

    public  function changePassword(ChangePasswordUserRequestDTO $request)
    {

        // $user = User::find($request->getID());

        // if (!checkPasswordHash($request->getOldPassword(), $user->password))
        //     abort(400, 'Old password is not correct !!!');

        // $user->password = hashPassword($request->getNewPassword());

        // $user->save();
        // $userDTO = new UserResponseDTO($user);
        // return $userDTO->toJSON();

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

        // $user = User::find($id);

        // if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        // $fileResponse = $this->fileService->upload($file);
        // try {
        //     $fileDelete = new DeleteFileRequestDTO($user->avatar);
        //     $fileDeleteResponse = $this->fileService->delete($fileDelete);
        // } catch (\Throwable $th) {
        // }

        // $user->avatar = $fileResponse;

        // $user->save();

        // $userDTO = new UserResponseDTO($user);
        // return $userDTO->toJSON();

        $user = User::find($id);

        if (!$user) return abort(400, MESSAGE_ERROR_USER_NOT_FOUND);

        $fileResponse = $this->fileService->upload($file);
        try {
            $fileDelete = new DeleteFileRequestDTO($user->avatar);
            $fileDeleteResponse = $this->fileService->delete($fileDelete);
        } catch (\Throwable $th) {
        }

        $user->avatar = $fileResponse;

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
}
