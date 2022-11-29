<?php

namespace App\DTO\request;

use Illuminate\Http\Request;
use App\DTO\request\PaginateRequestDTO;
use App\DTO\request\TypeModelPaginateRequestDTO;

class BasePaginateRequestDTO
{
    public PaginateRequestDTO $option;
    public TypeModelPaginateRequestDTO $type_model;

    public function __construct(Request $request, string $type)
    {
        $this->option = new PaginateRequestDTO($request);
        $this->type_model = new TypeModelPaginateRequestDTO($type);
    }
}
