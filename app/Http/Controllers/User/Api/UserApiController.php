<?php

namespace App\Http\Controllers\User\Api;

use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Request\User\ChangePasswordUserRequestDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\Request\User\UpdateUserRequestDTO;
use App\Services\UserService;
use App\Validate\UserValidate;
use App\Traits\HttpResponse;
use App\Traits\Authenticate;

class UserApiController extends Controller
{
    use HttpResponse;
    use Authenticate;
    protected UserService $userService;
    protected UserValidate $userValidate;

    public function __construct()
    {
        $this->userValidate = new UserValidate();
        $this->userService = new userService();
    }

    public function me(Request $request)
    {
        try {
            $user_id = $this->getInfoUser($request)->id;
            $userResponse = $this->userService->me($user_id);
            return $this->success($userResponse, MESSAGE_SUCCESS_GET_ME, 200);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $user_id = $this->getInfoUser($request)->id;
            $userRequest = new UpdateUserRequestDTO($request, $user_id);
            $this->userValidate->validateInfoUserUpdate($userRequest);
            $data = $this->userService->update($userRequest);
            return $this->success($data, MESSAGE_SUCCESS_UPDATE_MY_PROFILE, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function uploadAvatar(Request $request)
    {
        try {
            $user_id = $this->getInfoUser($request)->id;
            $this->userValidate->validateInfoUserID($user_id);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $userResponse = $this->userService->uploadAvatar($fileRequest, $user_id);
            return $this->success($userResponse, MESSAGE_SUCCESS_UPLOAD_MY_AVATAR, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $user_id = $this->getInfoUser($request)->id;
            $request = new ChangePasswordUserRequestDTO($request, $user_id);
            $this->userValidate->validateInfoUserChangePassword($request);
            $data = $this->userService->changePassword($request);
            return $this->success($data, MESSAGE_SUCCESS_CHANGE_MY_PASSWORD, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
