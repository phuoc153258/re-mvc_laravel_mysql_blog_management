<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Services\PermissionService;
use App\Validate\PermissionValidate;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;

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
            $validate = $this->roleValidate->validateInfoIdRole($id);
            $roleResponse = $this->roleService->show($id);
            return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    // public function create(Request $request)
    // {
    //     try {
    //         $validate = $this->roleValidate->validateInfoNameRole($request->input('name'));
    //         $roleResponse = $this->roleService->create($request->input('name'));
    //         return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
    //     } catch (\Throwable $th) {
    //         return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
    //     }
    // }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         $roleRequest = new UpdateRoleRequestDTO($request, $id);
    //         $validate = $this->roleValidate->validateInfoUpdateRole($roleRequest);
    //         $roleResponse = $this->roleService->update($roleRequest);
    //         return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
    //     } catch (\Throwable $th) {
    //         return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
    //     }
    // }

    // public function delete($id)
    // {
    //     try {
    //         $validate = $this->roleValidate->validateInfoIdRole($id);
    //         $roleResponse = $this->roleService->delete($id);
    //         return $this->success(MESSAGE_SUCCESS_DELETE_ROLE, MESSAGE_BASE_SUCCESS, 200);
    //     } catch (\Throwable $th) {
    //         return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
    //     }
    // }
}
