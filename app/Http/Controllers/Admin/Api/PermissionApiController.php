<?php

namespace App\Http\Controllers\Admin\Api;

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
            return $this->success($permissionResponse, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function show($id)
    {
        try {
            $this->permissionValidate->validateInfoIdPermission($id);
            $permissionResponse = $this->permissionService->show($id);
            return $this->success($permissionResponse, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $this->permissionValidate->validateInfoNamePermission($request->input('name'));
            $permissionResponse = $this->permissionService->create($request->input('name'));
            return $this->success($permissionResponse, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $permissionRequest = new UpdatePermissionRequestDTO($request, $id);
            $this->permissionValidate->validateInfoUpdatePermission($permissionRequest);
            $permissionResponse = $this->permissionService->update($permissionRequest);
            return $this->success($permissionResponse, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $this->permissionValidate->validateInfoIdPermission($id);
            $this->permissionService->delete($id);
            $option = new BasePaginateRequestDTO($request, 'permissions');
            $data = $this->permissionService->getList($option);
            return $this->success($data, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function givePermission($user_id, $permission_id)
    {
        try {
            $permissionRequest = new GivePermissionUserRequestDTO($user_id, $permission_id);
            $this->permissionValidate->validateInfoGivePermission($permissionRequest);
            $permissionResponse = $this->permissionService->givePermission($permissionRequest);
            return $this->success($permissionResponse, trans('success.permission.give-permission'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function revokePermission($user_id, $permission_id)
    {
        try {
            $permissionRequest = new GivePermissionUserRequestDTO($user_id, $permission_id);
            $this->permissionValidate->validateInfoGivePermission($permissionRequest);
            $permissionResponse = $this->permissionService->revokePermission($permissionRequest);
            return $this->success($permissionResponse, trans('success.role.remove-role'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }
}
