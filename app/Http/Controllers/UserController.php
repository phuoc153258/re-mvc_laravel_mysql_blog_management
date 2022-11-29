<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DTO\request\BasePaginateRequestDTO;
use App\Services\UserService;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index(Request $request)
    {
        try {
            $option = new BasePaginateRequestDTO($request, 'users');
            $data = $this->userService->getList($option);
            return view('user', [
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

    public function show($id)
    {
        try {
            $user = $this->userService->show($id);
            return view('detail_user', ["user" => $user]);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function changePassword(Request $request, $id)
    {
        try {
            return view('change_password', ["user_id" => $id]);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
