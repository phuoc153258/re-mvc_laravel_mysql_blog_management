@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Change password</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <div class="form-group mb-3">
                            <label for="">Old password:</label>
                            <input type="password" class="form-control" id="old-password-user-js"
                                placeholder="Old password..." autocomplete="new-password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">New password:</label>
                            <input type="password" class="form-control" id="new-password-user-js"
                                placeholder="New password...">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Confirm password:</label>
                            <input type="password" class="form-control" id="re-password-user-js"
                                placeholder="Confirm password...">
                        </div>
                        <div class="d-flex flex-row-reverse" style="gap: 0 15px;">
                            <a type="submit" class="btn btn-primary" onclick="changePassword()">Submit</a>
                            <a id="back-to-details-user-js" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/users/data.js') }}"></script>
    <script src="{{ asset('js/users/file.js') }}"></script>
    <script src="{{ asset('js/users/index.js') }}"></script>
    <script src="{{ asset('js/users/pageChangePassword.js') }}"></script>
@endsection
