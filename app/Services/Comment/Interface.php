<?php

namespace App\Services\Comment;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;

interface ICommentService
{
    public function getList(BasePaginateRequestDTO $option): mixed;
}
