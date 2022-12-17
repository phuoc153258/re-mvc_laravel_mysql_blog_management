<?php

namespace App\Http\Controllers\User\Api;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Traits\Authenticate;
use App\Services\Comment\CommentService;

class CommentApiController extends Controller
{
    use HttpResponse;
    use Authenticate;
    protected CommentService $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    public function index(Request $request, $slug)
    {
        try {
            $option = new BasePaginateRequestDTO($request, 'comments');
            $data = $this->commentService->getList($option);
            return $this->success($data, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }
}
