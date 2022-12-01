<?php

namespace App\DTO\Request\Paginate;

use Illuminate\Http\Request;
use App\DTO\Request\Paginate\PaginateRequestDTO;
use App\DTO\Request\Paginate\TypeModelPaginateRequestDTO;

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
