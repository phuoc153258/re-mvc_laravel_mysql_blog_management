<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\Role\UpdateRoleRequestDTO;
use App\DTO\Request\Role\AssignRoleUserRequestDTO;
use App\Validate\RoleValidate;
use App\Traits\HttpResponse;
use App\Services\RoleService;

class RoleApiController extends Controller
{
    use HttpResponse;
    protected RoleService $roleService;
    protected RoleValidate $roleValidate;

    public function __construct()
    {
        $this->roleValidate = new RoleValidate();
        $this->roleService = new RoleService();
    }

    public function index(Request $request)
    {
        try {
            $option = new BasePaginateRequestDTO($request, 'roles');
            $roleResponse = $this->roleService->getList($option);
            return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function show($id)
    {
        try {
            $this->roleValidate->validateInfoIdRole($id);
            $roleResponse = $this->roleService->show($id);
            return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $this->roleValidate->validateInfoNameRole($request->input('name'));
            $roleResponse = $this->roleService->create($request->input('name'));
            return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $roleRequest = new UpdateRoleRequestDTO($request, $id);
            $this->roleValidate->validateInfoUpdateRole($roleRequest);
            $roleResponse = $this->roleService->update($roleRequest);
            return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function delete($id)
    {
        try {
            $this->roleValidate->validateInfoIdRole($id);
            $roleResponse = $this->roleService->delete($id);
            return $this->success(MESSAGE_SUCCESS_DELETE_ROLE, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function assignRole($user_id, $role_id)
    {
        try {
            $userRequest = new AssignRoleUserRequestDTO($user_id, $role_id);
            $this->roleValidate->validateInfoAssignRoleUser($userRequest);
            $roleResponse = $this->roleService->assignRole($userRequest);
            return $this->success($roleResponse, MESSAGE_SUCCESS_ASSIGN_ROLE, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function removeRole($user_id, $role_id)
    {
        try {
            $userRequest = new AssignRoleUserRequestDTO($user_id, $role_id);
            $this->roleValidate->validateInfoAssignRoleUser($userRequest);
            $roleResponse = $this->roleService->removeRole($userRequest);
            return $this->success($roleResponse, MESSAGE_SUCCESS_REMOVE_ROLE, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
