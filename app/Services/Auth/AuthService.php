<?php

namespace App\Services\Auth;

use App\DTO\Request\Auth\LoginUserRequestDTO;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\DTO\Request\Auth\RegisterUserRequestDTO;
use App\DTO\Request\Auth\ResetPasswordUserRequestDTO;
use App\DTO\Request\Auth\VerifyOTPRequestDTO;
use App\DTO\Response\Auth\AuthUserResponseDTO;
use App\DTO\Response\User\UserResponseDTO;
use App\Models\OTP;
use App\Services\Auth\IAuthService;
use App\Jobs\ForgotPasswordJob;
use Illuminate\Support\Carbon;

class AuthService implements IAuthService
{
    public function __construct()
    {
    }

    public function register(RegisterUserRequestDTO $userRequest): AuthUserResponseDTO
    {
        $user = User::create($userRequest->toArray());
        $token = $user->createToken('API Token')->plainTextToken;
        $user->assignRole([ROLE_USER_ID])->givePermissionTo(PERMISSION_REGISTER_USER_DEFAULT);
        $user->save();
        $userDTO = new UserResponseDTO(User::find($user->id));
        return new AuthUserResponseDTO($userDTO, $token);
    }

    public function login(LoginUserRequestDTO $userRequest): AuthUserResponseDTO
    {
        if (!Auth::attempt($userRequest->toArray())) return abort(401, trans('error.auth.login-user'));

        $user = User::where('username', $userRequest->getUsername())->first();
        $userDTO = new UserResponseDTO($user);
        $token = $user->createToken('API Token')->plainTextToken;
        return new AuthUserResponseDTO($userDTO, $token);
    }

    public function logout(mixed $user): string
    {
        $user->currentAccessToken()->delete();
        return trans('success.auth.logout-user');
    }

    public function sendMail(string $email): string
    {
        $user = User::where([
            'email' => $email,
            'is_email_verified' => MAIL_VERIFY_TRUE
        ])->get()->first();

        if (!$user || $user == null) abort(400, trans('error.user.email-not-found'));

        OTP::where('user_id', $user->id)->delete();

        $otp = OTP::with('users')->create([
            'otp' => genarateOtp(),
            'user_id' => $user->id
        ]);
        $forgotPasswordJob = new ForgotPasswordJob($user, $otp->otp, OTP_EXPIRED_TIME_STR);
        dispatch($forgotPasswordJob);
        return trans('success.mail.please-check-mail');
    }

    public function verifyOTP(VerifyOTPRequestDTO $userRequest)
    {
        $user = User::where([
            'email' => $userRequest->getEmail(),
            'is_email_verified' => MAIL_VERIFY_TRUE
        ])->get()->first();
        if (!$user || $user == null) abort(400, trans('error.user.email-not-found'));

        $otp = OTP::where('user_id', $user->id)->get()->first();
        if (!$otp || $otp == null) abort(400, trans('error.otp.user-not-send-otp-mail'));

        if (Carbon::now()->gt(addMinutesToDate($otp->created_at, OTP_EXPIRED_TIME))) abort(400, trans('error.otp.otp-expired-time'));

        if ($userRequest->getOTP() != $otp->otp) abort(400, trans('error.otp.otp-do-not-match'));

        $token = $user->createToken('API Token')->plainTextToken;
        OTP::where('user_id', $user->id)->delete();
        return $token;
    }

    public function resetPassword(ResetPasswordUserRequestDTO $userRequest)
    {
        $user = User::find($userRequest->getUser()->id);

        $user->password = hashPassword($userRequest->getPassword());
        $user->save();
        $userDTO = new UserResponseDTO($user);
        $this->logout($userRequest->getUser());
        return $userDTO;
    }
}
