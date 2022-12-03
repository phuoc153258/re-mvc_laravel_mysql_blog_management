<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Services\PermissionService;
use App\Validate\PermissionValidate;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Permission\GivePermissionUserRequestDTO;
use App\DTO\Request\Permission\UpdatePermissionRequestDTO;

class PermissionApiController extends Controller
{
    use HttpResponse;
    protected PermissionService $permissionService;
    protected PermissionValidate $permissionValidate;

    public function __construct()
    {
        $this->permissionService = new PermissionService();
        $this->permissionValidate = new PermissionValidate();
    }

    public function index(Request $request)
    {
        try {
            $option = new BasePaginateRequestDTO($request, 'permissions');
            $permissionResponse = $this->permissionService->getList($option);
            return $this->success($permissionResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function show($id)
    {
        try {
            $this->permissionValidate->validateInfoIdPermission($id);
            $permissionResponse = $this->permissionService->show($id);
            return $this->success($permissionResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $this->permissionValidate->validateInfoNamePermission($request->input('name'));
            $permissionResponse = $this->permissionService->create($request->input('name'));
            return $this->success($permissionResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $permissionRequest = new UpdatePermissionRequestDTO($request, $id);
            $this->permissionValidate->validateInfoUpdatePermission($permissionRequest);
            $permissionResponse = $this->permissionService->update($permissionRequest);
            return $this->success($permissionResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function delete($id)
    {
        try {
            $this->permissionValidate->validateInfoIdPermission($id);
            $permissionResponse = $this->permissionService->delete($id);
            return $this->success(MESSAGE_SUCCESS_DELETE_PERMISSION, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function givePermission($user_id, $permission_id)
    {
        try {
            $permissionRequest = new GivePermissionUserRequestDTO($user_id, $permission_id);
            $this->permissionValidate->validateInfoGivePermission($permissionRequest);
            $permissionResponse = $this->permissionService->givePermission($permissionRequest);
            return $this->success($permissionResponse, MESSAGE_SUCCESS_GIVE_PERMISSION, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function revokePermission($user_id, $permission_id)
    {
        try {
            $permissionRequest = new GivePermissionUserRequestDTO($user_id, $permission_id);
            $this->permissionValidate->validateInfoGivePermission($permissionRequest);
            $permissionResponse = $this->permissionService->revokePermission($permissionRequest);
            return $this->success($permissionResponse, MESSAGE_SUCCESS_REMOVE_ROLE, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
