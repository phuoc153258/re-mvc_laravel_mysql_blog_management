<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Traits\HttpResponse;

class UserApiController extends Controller
{
    use HttpResponse;
    protected UserService $userService;

    public function __construct()
    {
        $this->userService = new userService();
    }

    public function me(Request $request)
    {
        try {
            $userResponse = $this->userService->show($request->user()->id);
            return $this->success($userResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
