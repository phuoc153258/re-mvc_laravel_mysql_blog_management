<?php

namespace App\Services;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Response\Permission\PermissionResponseDTO;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    protected PaginateService $paginateService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
    }

    public  function getList(BasePaginateRequestDTO $option)
    {
        $data = $this->paginateService->paginate($option);
        return $data;
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        $permissionDTO = new PermissionResponseDTO($permission);
        return $permissionDTO->toJSON();
    }
}
