<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Traits\HttpResponse;
use App\DTO\request\BasePaginateRequestDTO;

class RoleApiController extends Controller
{
    use HttpResponse;
    protected RoleService $roleService;

    public function __construct()
    {
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
}
