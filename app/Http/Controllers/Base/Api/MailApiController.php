<?php

namespace App\Http\Controllers\Base\Api;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use App\Services\MailService;
use Illuminate\Support\Facades\Mail;
use App\Traits\Authenticate;
use App\Traits\HttpResponse;
use App\Validate\MailValidate;

class MailApiController extends Controller
{
    use Authenticate;
    use HttpResponse;
    protected MailValidate $mailValidate;
    protected MailService $mailService;

    public function __construct()
    {
        $this->mailValidate = new MailValidate();
        $this->mailService = new MailService();
    }

    public function welcome($email)
    {
        try {
            $mailRequest = new WelcomeMailRequestDTO($email);
            $this->mailValidate->validateEmail($mailRequest);
            $mailResponse = $this->mailService->welcome($mailRequest);
            return $this->success($mailResponse, MESSAGE_SUCCESS_MAIL_BASE, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_ERROR_MAIL_BASE, 400);
        }
    }

    public function verifyMail(Request $request)
    {
        try {
            $user = $this->getInfoUser($request);
            $mailResponse = $this->mailService->verifyMail($user);
            return $this->success($mailResponse, MESSAGE_SUCCESS_MAIL_BASE, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function handleVerifyMail(Request $request)
    {
        try {
            $user_id = $this->getInfoUser($request)->id;
            $userResposne = $this->mailService->handleVerifyMail($user_id);
            return $this->success($userResposne, MESSAGE_SUCCESS_VERIFY_MAIL, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
