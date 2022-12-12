@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Forgot Password') }}</div>
                    <div class="card-body">
                        <div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end mt-auto mb-auto">{{ __('Email Address:') }}</label>
                                <div class="col-md-6 d-flex" style="gap: 0 10px;">
                                    <input id="email-forgot-password-js" type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <a type="submit" class="btn btn-link w-50 p-0 mt-auto mb-auto"
                                        onclick="sendMailForgotPassword()">
                                        {{ __('Send mail') }}
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end mt-auto mb-auto">{{ __('OTP:') }}</label>
                                <div class="col-md-6 d-flex" style="gap: 0 10px;">
                                    <input id="otp-forgot-password-js" type="text" class="form-control" required
                                        autocomplete="email" autofocus>
                                    <a type="submit" class="btn btn-link w-50 p-0 mt-auto mb-auto"
                                        onclick="verifyOTPForgotPassword()">
                                        {{ __('Verify OTP') }}
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end mt-auto mb-auto">{{ __('New password:') }}</label>
                                <div class="col-md-6 d-flex" style="gap: 0 10px;">
                                    <input id="new-password-forgot-password-js" type="password" class="form-control"
                                        required autocomplete="email" autofocus readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end mt-auto mb-auto">{{ __('Confirm password:') }}</label>
                                <div class="col-md-6 d-flex" style="gap: 0 10px;">
                                    <input id="confirm-password-forgot-password-js" type="password" class="form-control"
                                        required autocomplete="email" autofocus readonly>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-primary" onclick="resetPassword()">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="check-email-send-js" value="0" hidden>
    <input type="text" id="check-otp-verify-js" value="0" hidden>
    <input type="text" id="token-reset-password-js" value="" hidden>
@endsection
