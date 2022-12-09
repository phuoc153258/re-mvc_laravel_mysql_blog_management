@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('view.permission.create-permission') }}</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="form-group mb-3">
                            <label for="">{{ __('view.permission.name') }}:</label>
                            <input type="text" class="form-control" placeholder="Name..." value=""
                                id="name-create-js">
                        </div>
                        <div class="d-flex flex-row-reverse mt-4" style="gap: 0 15px;">
                            <a class="btn btn-primary" onclick="createPermission()">{{ __('view.action.add') }}</a>
                            <a href="/roles" class="btn btn-secondary">{{ __('view.action.back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin/permission/data.js') }}"></script>
    <script src="{{ asset('js/admin/permission/index.js') }}"></script>
    <script src="{{ asset('js/admin/permission/pageCreatePermission.js') }}"></script>
@endsection
