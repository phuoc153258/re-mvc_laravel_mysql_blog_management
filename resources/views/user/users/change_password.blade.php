@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>{{ __('view.user.change-password') }}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.user.old-password') }}:</label>
                            <input type="password" class="form-control" id="old-password-user-js"
                                placeholder="{{ __('view.user.old-password') }}..." autocomplete="new-password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.user.new-password') }}:</label>
                            <input type="password" class="form-control" id="new-password-user-js"
                                placeholder="{{ __('view.user.new-password') }}...">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.user.confirm-password') }}:</label>
                            <input type="password" class="form-control" id="re-password-user-js"
                                placeholder="{{ __('view.user.confirm-password') }}...">
                        </div>
                        <div class="d-flex flex-row-reverse" style="gap: 0 15px;">
                            <a type="submit" class="btn btn-primary"
                                onclick="changePassword()">{{ __('view.action.update') }}</a>
                            <a href="/users" class="btn btn-secondary">{{ __('view.action.back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/helper/users/index.js') }}"></script>
    <script src="{{ asset('js/user/users/data.js') }}"></script>
    <script src="{{ asset('js/user/users/pageChangePassword.js') }}"></script>
@endsection
