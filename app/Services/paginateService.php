<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\DTO\request\BasePaginateRequestDTO;
use App\DTO\response\PaginateResponeDTO;

class PaginateService
{
    public function __construct()
    {
    }

    public static function paginate(BasePaginateRequestDTO $paginateOption)
    {
        $limit = $paginateOption->option->getLimit();
        $page = $paginateOption->option->getPage();
        $sort = $paginateOption->option->getSort();
        $search = $paginateOption->option->getSearch();
        $query =  DB::table($paginateOption->type_model->getType());

        if ($paginateOption->type_model->getType() == 'blogs')
            $query->join('users', 'blogs.user_id', '=', 'users.id');

        if ($search)
            $query
                ->whereRaw($paginateOption->type_model->getSeachBy() . " like '%" . $search . "%'");

        if ($sort)
            $query
                ->orderBy($paginateOption->type_model->getSortBy(), $sort);

        $total = $query->count();

        $data = null;
        if ($paginateOption->type_model->getType() == 'blogs') {
            $data = $query->offset(($page - 1) * $limit)
                ->limit($limit)
                ->select('blogs.*', 'users.username')
                ->get();
        } else
            $data = $query->offset(($page - 1) * $limit)
                ->limit($limit)
                ->select()
                ->get();

        return [
            'data' => $data,
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'sort' => $sort,
            'last_page' => ceil($total / $limit)
        ];
    }
}
