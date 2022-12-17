<?php

namespace App\Http\Controllers\User\Api;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Traits\Authenticate;
use App\Services\Comment\CommentService;
use App\Validate\BlogValidate;

class CommentApiController extends Controller
{
    use HttpResponse;
    use Authenticate;
    protected CommentService $commentService;
    protected BlogValidate $blogValidate;

    public function __construct()
    {
        $this->commentService = new CommentService();
        $this->blogValidate = new BlogValidate();
    }

    public function index(Request $request, $slug)
    {
        try {
            $this->blogValidate->validateSlugBlog($slug);
            $option = new BasePaginateRequestDTO($request, 'comments');
            $data = $this->commentService->getList($option, $slug);
            return $this->success($data, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }
}
