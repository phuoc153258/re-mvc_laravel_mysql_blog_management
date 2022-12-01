<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use App\DTO\response\RoleResponseDTO;
use App\DTO\request\BasePaginateRequestDTO;
use App\Services\PaginateService;

class RoleService
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
}
