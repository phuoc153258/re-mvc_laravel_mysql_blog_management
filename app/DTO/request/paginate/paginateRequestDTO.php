<?php

namespace App\DTO\request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PaginateRequestDTO
{
    private string $search;
    private string $sort;
    private int $limit;
    private int $page;

    public function __construct(Request $request)
    {
        $this->search = $request->input('search') ? $request->input('search') : PAGINATE['SEARCH'];

        $this->sort = PAGINATE['SORT'];

        if (strtolower($request->input('sort')) == PAGINATE['ASC'])
            $this->sort = PAGINATE['ASC'];

        if (strtolower($request->input('sort')) == PAGINATE['DESC'])
            $this->sort = PAGINATE['DESC'];

        $this->limit = $request->input('limit') ? $request->input('limit') : PAGINATE['LIMIT'];
        $this->page = $request->input('page') ? $request->input('page') : PAGINATE['PAGE'];
    }

    public function getSearch()
    {
        return $this->search;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function getPage()
    {
        return $this->page;
    }
}
