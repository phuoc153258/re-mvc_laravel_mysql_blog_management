<?php

namespace App\DTO\request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TypeModelPaginateRequestDTO
{
    private string $type;
    private string $search_by;
    private string $sort_by;

    public function __construct(string $type)
    {
        if ($type == PAGINATE_TYPE['USER']['NAME']) {
            $this->type = PAGINATE_TYPE['USER']['NAME'];
            $this->search_by = PAGINATE_TYPE['USER']['SEARCH_BY'];
            $this->sort_by = PAGINATE_TYPE['USER']['SORT_BY'];
        }

        if ($type == PAGINATE_TYPE['BLOG']['NAME']) {
            $this->type = PAGINATE_TYPE['BLOG']['NAME'];
            $this->search_by = PAGINATE_TYPE['BLOG']['SEARCH_BY'];
            $this->sort_by = PAGINATE_TYPE['BLOG']['SORT_BY'];
        }
    }
    public function getType()
    {
        return $this->type;
    }

    public function getSeachBy()
    {
        return $this->search_by;
    }

    public function getSortBy()
    {
        return $this->sort_by;
    }
}
