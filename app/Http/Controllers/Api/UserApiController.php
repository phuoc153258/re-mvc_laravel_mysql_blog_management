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
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $userRequest = new UpdateUserRequestDTO($request, $id);
            $validate = $this->userValidate->validateInfoUserUpdate($userRequest);
            $data = $this->userService->update($userRequest);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $validate = $this->userValidate->validateInfoUserID($id);
            $this->userService->deleteUser($id);
            $option = new BasePaginateRequestDTO($request, 'users');
            $data = $this->userService->getList($option);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function changePassword(Request $request, $id)
    {
        try {
            $request = new ChangePasswordUserRequestDTO($request, $id);
            $validate = $this->userValidate->validateInfoUserChangePassword($request);
            $data = $this->userService->changePassword($request);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function uploadAvatar(Request $request, $id)
    {
        try {
            $validate = $this->userValidate->validateInfoUserID($id);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $userResponse = $this->userService->uploadAvatar($fileRequest, $id);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $userResponse
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }
}
