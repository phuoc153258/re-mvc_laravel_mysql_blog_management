<?php

namespace App\Services\Comment;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\Services\Comment\ICommentService;
use App\Services\Paginate\PaginateService;

class CommentService implements ICommentService
{
    protected PaginateService $paginateService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
    }

    public function getList(BasePaginateRequestDTO $option): mixed
    {
        $data = $this->paginateService->paginate($option);
        return $data;
    }
}
