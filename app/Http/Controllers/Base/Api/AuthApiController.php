<?php

namespace App\Http\Controllers\Base\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\Request\Auth\LoginUserRequestDTO;
use App\DTO\Request\Auth\RegisterUserRequestDTO;
use App\DTO\Request\Auth\VerifyOTPRequestDTO;
use App\Services\Auth\AuthService;
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
            $userResponse = $this->authService->login($userRequest)->toJSON();
            return $this->success($userResponse, trans('success.auth.login-user'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('error.auth.login-failed'), 400);
        }
    }

    public function register(Request $request)
    {
        try {
            $userRequest = new RegisterUserRequestDTO($request);
            $this->authValidate->validateInfoRegisterUser($userRequest);
            $userResponse = $this->authService->register($userRequest)->toJSON();
            return $this->success($userResponse, trans('success.auth.register-user'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('error.auth.register-failed'), 400);
        }
    }

    public function logout(Request $request)
    {
        try {
            $response =  $this->authService->logout($request->user());
            return $this->success($response, trans('success.auth.logout-user'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function sendMail(Request $request, $email)
    {
        try {
            $this->authValidate->validateEmailForgotPassword($email);
            $response =  $this->authService->sendMail($email);
            return $this->success($response, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function verifyOtp(Request $request, $email)
    {
        try {
            $userRequest = new VerifyOTPRequestDTO($request, $email);
            $this->authValidate->validateInfoVerifyOTP($userRequest);
            $response =  $this->authService->verifyOTP($userRequest);
            return $this->success($response, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }
}
