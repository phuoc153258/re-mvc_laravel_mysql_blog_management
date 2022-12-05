@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">Username:</label>
                        <div class="col-md-6">
                            <input id="username-register-js" type="text" class="form-control" name="username"
                                value="" required autocomplete="username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fullname" class="col-md-4 col-form-label text-md-end">Fullname:</label>
                        <div class="col-md-6">
                            <input id="fullname-register-js" type="text" class="form-control" name="fullname"
                                value="" required autocomplete="fullname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>

                        <div class="col-md-6">
                            <input id="email-register-js" type="email" class="form-control" name="email" required
                                autocomplete="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input id="password-register-js" type="password" class="form-control" name="password" required
                                autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>
                        <div class="col-md-6">
                            <input id="password-confirm-register-js" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a class="btn btn-primary" onclick="registerUser()">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/auth/data.js') }}"></script>
    <script src="{{ asset('js/auth/index.js') }}"></script>
    <script src="{{ asset('js/auth/pageRegister.js') }}"></script>
@endsection
