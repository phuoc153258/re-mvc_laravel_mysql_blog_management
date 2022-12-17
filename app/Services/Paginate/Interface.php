<?php

namespace App\Services\Paginate;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use Illuminate\Database\Query\Builder;

interface IPaginateService
{
    public function paginate(BasePaginateRequestDTO $paginateOption, Builder $query): mixed;
}
