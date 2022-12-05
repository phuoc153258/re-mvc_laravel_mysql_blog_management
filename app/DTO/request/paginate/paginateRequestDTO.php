<?php

namespace App\DTO\Request\Paginate;

use Illuminate\Http\Request;

class PaginateRequestDTO
{
    private string $search = PAGINATE['SEARCH'];
    private string $sort = PAGINATE['SORT'];
    private int $limit = PAGINATE['LIMIT'];
    private int $page = PAGINATE['PAGE'];
    private ?string $condition = null;
    private bool $is_paginate = PAGINATE['IS_PAGINATE'];

    public function __construct(Request $request)
    {
        if ($request->input('search'))
            $this->search = $request->input('search');

        if (strtolower($request->input('sort')) == PAGINATE['ASC'])
            $this->sort = PAGINATE['ASC'];

        if (strtolower($request->input('sort')) == PAGINATE['DESC'])
            $this->sort = PAGINATE['DESC'];

        if ($request->input('limit'))
            $this->limit =   $request->input('limit');

        if ($request->input('page'))
            $this->page = $request->input('page');

        if ($request->input('condition') != '' || $request->input('condition'))
            $this->condition = $request->input('condition');

        if ($request->input('is_paginate'))
            $this->is_paginate = stringToBool($request->input('is_paginate'));
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

    public function getCondition()
    {
        return $this->condition;
    }

    public function getIsPaginate()
    {
        return $this->is_paginate;
    }
}
