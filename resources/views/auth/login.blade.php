@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('view.login.login') }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="username"
                                class="col-md-4 col-form-label text-md-end">{{ __('view.login.username') }}:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="username-login-js">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('view.login.password') }}:</label>

                            <div class="col-md-6">
                                <input type="password" value="" class="form-control" autocomplete="new-password"
                                    id="password-login-js">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4 d-flex" style="gap: 0 20px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        {{ __('view.login.remember-me') }}
                                    </label>
                                </div>
                                <a href="/auth/forgot-password">Forgot password</a>
                            </div>

                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a type="submit" class="btn btn-primary" onclick="loginUser()">
                                    {{ __('view.login.login') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/auth/pageLogin.js') }}"></script>
@endsection
