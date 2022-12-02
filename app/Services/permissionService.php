<?php

namespace App\Services;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;

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
}
