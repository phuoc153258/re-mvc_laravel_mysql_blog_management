@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('view.permission.detail-permission') }}</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.permission.id') }}:</label>
                            <input type="text" class="form-control" placeholder="ID..." value="" readonly
                                id="id-role-js">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.permission.name') }}:</label>
                            <input type="text" class="form-control" placeholder="{{ __('view.permission.name') }}..."
                                value="" id="name-role-js">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.permission.guard-name') }}:</label>
                            <input type="text" class="form-control"
                                placeholder="{{ __('view.permission.guard-name') }}..." value=""
                                id="guard-name-role-js">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.permission.created-at') }}:</label>
                            <input type="text" class="form-control" id="created_at-role-js"
                                placeholder="{{ __('view.permission.created-at') }}..." value="" readonly
                                name="created_at">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.permission.updated-at') }}:</label>
                            <input type="text" class="form-control" id="updated_at-role-js"
                                placeholder="{{ __('view.permission.updated-at') }}..." value="" readonly
                                name="updated_at">
                        </div>
                        <div class="d-flex flex-row-reverse mt-4" style="gap: 0 15px;">
                            <button type="submit" class="btn btn-primary"
                                onclick="updatePermission()">{{ __('view.action.update') }}</button>
                            <a href="/blogs" class="btn btn-secondary">{{ __('view.action.back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin/permission/data.js') }}"></script>
    <script src="{{ asset('js/admin/permission/index.js') }}"></script>
    <script src="{{ asset('js/admin/permission/pageDetailPermission.js') }}"></script>
@endsection
