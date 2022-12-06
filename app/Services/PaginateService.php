<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;

class PaginateService
{
    public function __construct()
    {
    }

    public function paginate(BasePaginateRequestDTO $paginateOption,  $user_id = null)
    {
        $query =  DB::table($paginateOption->type_model->getType());

        if ($paginateOption->type_model->getType() == 'blogs') {
            $query->join('users', 'blogs.user_id', '=', 'users.id');
            if ($user_id != null)
                $query->where('blogs.user_id', '=', $user_id);
        }

        if (!$paginateOption->option->getIsPaginate()) return $query->get();

        if ($paginateOption->option->getSearch())
            $query
                ->whereRaw($paginateOption->type_model->getSeachBy() . " like '%" .  $paginateOption->option->getSearch() . "%'");

        if ($paginateOption->option->getSort())
            $query
                ->orderBy($paginateOption->type_model->getSortBy(), $paginateOption->option->getSort());

        $total = $query->count();

        $data = null;
        if ($paginateOption->type_model->getType() == 'blogs') {
            $data = $query->offset(($paginateOption->option->getPage() - 1) *  $paginateOption->option->getLimit())
                ->limit($paginateOption->option->getLimit())
                ->select('blogs.*', 'users.username')
                ->get();
        } else
            $data = $query->offset(($paginateOption->option->getPage() - 1) *  $paginateOption->option->getLimit())
                ->limit($paginateOption->option->getLimit())
                ->select()
                ->get();

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
