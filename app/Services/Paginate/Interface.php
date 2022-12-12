<?php

namespace App\Services\Paginate;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;

interface IPaginateService
{
    public function paginate(BasePaginateRequestDTO $paginateOption,  $user_id = null): mixed;
}
