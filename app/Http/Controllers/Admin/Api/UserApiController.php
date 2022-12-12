<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\User\UpdateUserRequestDTO;
use App\DTO\Request\User\ChangePasswordUserRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\Services\User\UserService;
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
            return $this->success($data, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function show($id)
    {
        try {
            $userResponse = $this->userService->show($id);
            return $this->success($userResponse->toJSON(), trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $userRequest = new UpdateUserRequestDTO($request, $id);
            $this->userValidate->validateInfoUserUpdate($userRequest);
            $data = $this->userService->update($userRequest);
            return $this->success($data->toJSON(), trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $this->userValidate->validateInfoUserID($id);
            $this->userService->deleteUser($id);
            $option = new BasePaginateRequestDTO($request, 'users');
            $data = $this->userService->getList($option);
            return $this->success($data, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function resetPassword($id)
    {
        try {
            $this->userValidate->validateInfoUserID($id);
            $data = $this->userService->resetPassword($id);
            return $this->success($data->toJSON(), trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function uploadAvatar(Request $request, $id)
    {
        try {
            $this->userValidate->validateInfoUserID($id);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $userResponse = $this->userService->uploadAvatar($fileRequest, $id);
            return $this->success($userResponse->toJSON(), trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }
}
