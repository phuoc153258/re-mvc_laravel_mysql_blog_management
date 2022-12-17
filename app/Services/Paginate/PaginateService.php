<?php

namespace App\Services\Paginate;

use Illuminate\Support\Facades\DB;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\Services\Paginate\IPaginateService;
use Illuminate\Database\Query\Builder;

class PaginateService implements IPaginateService
{
    public function __construct()
    {
    }

    public function paginate(BasePaginateRequestDTO $paginateOption, Builder $query): mixed
    {
        if (!$paginateOption->option->getIsPaginate()) return $query->get();

        if ($paginateOption->option->getSearch())
            $query
                ->whereRaw($paginateOption->type_model->getSeachBy() . " like '%" .  $paginateOption->option->getSearch() . "%'");

        if ($paginateOption->option->getSort())
            $query
                ->orderBy($paginateOption->type_model->getSortBy(), $paginateOption->option->getSort());

        $total = $query->count();
        $data = $query->offset(($paginateOption->option->getPage() - 1) *  $paginateOption->option->getLimit())
            ->limit($paginateOption->option->getLimit());

        return [
            'data' => $data,
            'total' => $total,
            'limit' =>  $paginateOption->option->getLimit(),
            'page' => $paginateOption->option->getPage(),
            'sort' => $paginateOption->option->getSort(),
            'last_page' => ceil($total /  $paginateOption->option->getLimit())
        ];
    }
}
