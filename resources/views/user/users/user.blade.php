@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>{{ __('view.user.detail-user') }}</h2>
            <a class="d-flex" style="gap: 0 10px; cursor: pointer; text-decoration: none; color: black" i
                href="/users/password">
                <p>{{ __('view.user.change-password') }}</p>
                <i class="fa-solid fa-pencil" style="line-height: 1.4"></i>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img class="w-75 mb-2"
                                    style="border-radius: 10%;display: block;border-radius: 10%;margin-left: auto;margin-right: auto;"
                                    src="" alt="" id="show-avatar-user-js">
                                <div class="file btn btn-primary" style="position: relative;overflow: hidden;">
                                    {{ __('view.action.upload') }}
                                    <input type="file" name="file"
                                        style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;" onchange=""
                                        value="" id="upload-avatar-user-js" />
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.user.id') }}:</label>
                                    <input type="text" class="form-control" placeholder="ID.." value="" readonly
                                        id="id-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.user.username') }}:</label>
                                    <input type="text" class="form-control" placeholder="Username..." value=""
                                        readonly id="username-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.user.fullname') }}:</label>
                                    <input type="text" class="form-control" placeholder="Fullname..." value=""
                                        id="fullname-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.user.email') }}:</label>
                                    <input type="email" class="form-control" placeholder="Email..." value=""
                                        id="email-user-update-js">
                                </div>
                                <div class="form-group mb-3" id="email-verify-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.user.created-at') }}:</label>
                                    <input type="text" class="form-control" placeholder="Created At..." value=""
                                        readonly id="created_at-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.user.updated-at') }}:</label>
                                    <input type="text" class="form-control" placeholder="Updated At..." value=""
                                        readonly id="updated_at-user-update-js">
                                </div>
                                <div class="d-flex flex-row-reverse" style="gap: 0 15px;">
                                    <a class="btn btn-primary" onclick="updateInfoUser()">{{ __('view.action.update') }}</a>
                                    <a href="/users" class="btn btn-secondary">
                                        {{ __('view.action.back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/helper/users/index.js') }}"></script>
    <script src="{{ asset('js/user/users/data.js') }}"></script>
    <script src="{{ asset('js/user/users/pageUser.js') }}"></script>
@endsection
