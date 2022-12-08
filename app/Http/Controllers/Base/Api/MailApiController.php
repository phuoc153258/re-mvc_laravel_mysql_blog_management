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
            return $this->success($mailResponse, trans('success.mail.mail-base'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('error.mail.mail-base'), 400);
        }
    }

    public function verifyMail(Request $request)
    {
        try {
            $user = $this->getInfoUser($request);
            $mailResponse = $this->mailService->verifyMail($user);
            return $this->success($mailResponse, trans('success.mail.mail-base'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('error.mail.mail-base'), 400);
        }
    }

    public function handleVerifyMail(Request $request)
    {
        try {
            $user_id = $this->getInfoUser($request)->id;
            $userResposne = $this->mailService->handleVerifyMail($user_id);
            return $this->success($userResposne, trans('success.mail.verify-mail'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('error.mail.mail-base'), 400);
        }
    }
}
