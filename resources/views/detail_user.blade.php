@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Detail User</h2>
        <a class="d-flex" style="gap: 0 10px; cursor: pointer; text-decoration: none; color: black" href="">
            <p>Change password</p>
            <i class="fa-solid fa-pencil" style="line-height: 1.4"></i>
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img class="w-75 mb-2" style="border-radius: 10%;" src="/" alt=""
                                    id="show-avatar-user-js">
                                <div class="file btn btn-primary" style="position: relative;overflow: hidden;">
                                    Upload
                                    <input type="file" name="file"
                                        style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;" onchange=""
                                        value="" id="upload-avatar-user-js" />
                                </div>
                            </div>
                            <div class="col-8">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label for="">ID:</label>
                                    <input type="text" class="form-control" placeholder="ID.." value="" readonly
                                        id="id-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Username:</label>
                                    <input type="text" class="form-control" placeholder="Username..." value=""
                                        readonly id="username-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Fullname:</label>
                                    <input type="text" class="form-control" placeholder="Fullname..." value=""
                                        id="fullname-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Email:</label>
                                    <input type="email" class="form-control" placeholder="Email..." value=""
                                        id="email-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Created At:</label>
                                    <input type="text" class="form-control" placeholder="Created At..." value=""
                                        readonly id="created_at-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Updated At:</label>
                                    <input type="text" class="form-control" placeholder="Updated At..." value=""
                                        readonly id="updated_at-user-update-js">
                                </div>
                                <div class="d-flex flex-row-reverse" style="gap: 0 15px;">
                                    <a class="btn btn-primary" onclick="updateInfoUser()">Submit</a>
                                    <a href="/users" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/users/data.js') }}"></script>
    <script src="{{ asset('js/users/file.js') }}"></script>
    <script src="{{ asset('js/users/index.js') }}"></script>
    <script src="{{ asset('js/users/pageDetailUser.js') }}"></script>
@endsection
