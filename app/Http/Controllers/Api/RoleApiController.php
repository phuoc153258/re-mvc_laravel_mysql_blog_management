<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\request\BasePaginateRequestDTO;
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
            $validate = $this->roleValidate->validateInfoIdRole($id);
            $roleResponse = $this->roleService->show($id);
            return $this->success($roleResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
