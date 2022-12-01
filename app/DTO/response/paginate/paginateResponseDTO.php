<?php

namespace App\DTO\Response\Paginate;

use Illuminate\Http\Request;

class PaginateResponeDTO
{
    // private mixed $data;
    private int $total;
    // private int $limit;
    // private int $page;
    // private int $last_page;
    // private string $sort;

    public function __construct(int $total)
    {
        // $this->data = $data;
        $this->total = $total;
    }

    // public function getData()
    // {
    //     return $this->data;
    // }

    public function getTotal()
    {
        return $this->total;
    }
}
