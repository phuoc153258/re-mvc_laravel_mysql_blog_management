<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\request\BasePaginateRequestDTO;
use App\Validate\BlogValidate;
use App\Services\BlogService;


class BlogController extends Controller
{
    protected BlogValidate $blogValidate;
    protected BlogService $blogService;

    public function __construct()
    {
        $this->blogValidate = new BlogValidate();
        $this->blogService = new BlogService();
    }

    function index(Request $request)
    {
        try {
            $option = new BasePaginateRequestDTO($request, 'blogs');
            $data = $this->blogService->getList($option);
            return view('blog', [
                'data' => $data['data'],
                'total' => $data['total'],
                'limit' => $data['limit'],
                'page' => $data['page'],
                'last_page' => $data['last_page'],
                'sort' => $data['sort']
            ]);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function show($id)
    {
        try {
            $validate = $this->blogValidate->validateInfoIdBlog($id);
            $blog = $this->blogService->show($id);
            return view('detail_blog', ["blog" => $blog]);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function create()
    {
        try {
            return view('create_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
