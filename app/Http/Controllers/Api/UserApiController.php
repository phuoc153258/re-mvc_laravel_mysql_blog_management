<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\request\BasePaginateRequestDTO;
use App\DTO\request\UpdateUserRequestDTO;
use App\DTO\request\ChangePasswordUserRequestDTO;
use App\DTO\request\UploadFileRequestDTO;
use App\Services\UserService;
use App\Validate\UserValidate;
use App\Traits\HttpResponse;

class UserApiController extends Controller
{
    use HttpResponse;
    protected UserService $userService;
    protected UserValidate $userValidate;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->userValidate = new UserValidate();
    }

    public function index(Request $request)
    {
        try {
            $option = new BasePaginateRequestDTO($request, 'users');
            $data = $this->userService->getList($option);
            return $this->success($data, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $userRequest = new UpdateUserRequestDTO($request, $id);
            $validate = $this->userValidate->validateInfoUserUpdate($userRequest);
            $data = $this->userService->update($userRequest);
            return $this->success($data, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $validate = $this->userValidate->validateInfoUserID($id);
            $this->userService->deleteUser($id);
            $option = new BasePaginateRequestDTO($request, 'users');
            $data = $this->userService->getList($option);
            return $this->success($data, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function changePassword(Request $request, $id)
    {
        try {
            $request = new ChangePasswordUserRequestDTO($request, $id);
            $validate = $this->userValidate->validateInfoUserChangePassword($request);
            $data = $this->userService->changePassword($request);
            return $this->success($data, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function uploadAvatar(Request $request, $id)
    {
        try {
            $validate = $this->userValidate->validateInfoUserID($id);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $userResponse = $this->userService->uploadAvatar($fileRequest, $id);
            return $this->success($userResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
