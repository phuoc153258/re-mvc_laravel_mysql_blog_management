<?php

namespace App\DTO\response;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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
