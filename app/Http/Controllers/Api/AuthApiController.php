<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\request\LoginUserRequestDTO;
use App\DTO\request\RegisterUserRequestDTO;
use App\Services\AuthService;
use App\Validate\AuthValidate;
use App\Traits\HttpResponse;

class AuthApiController extends Controller
{
    use HttpResponse;
    protected AuthValidate $authValidate;
    protected AuthService $authService;

    public function __construct()
    {
        $this->authValidate = new AuthValidate();
        $this->authService = new AuthService();
    }

    public function login(Request $request)
    {
        try {
            $userRequest = new LoginUserRequestDTO($request);
            $this->authValidate->validateInfoLoginUser($userRequest);
            $userResponse = $this->authService->login($userRequest);
            return $this->success($userResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function register(Request $request)
    {
        try {
            $userRequest = new RegisterUserRequestDTO($request);
            $this->authValidate->validateInfoRegisterUser($userRequest);
            $userResponse = $this->authService->register($userRequest);
            return $this->success($userResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
