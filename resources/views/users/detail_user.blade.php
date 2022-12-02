@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Detail User</h2>
        <a class="d-flex" style="gap: 0 10px; cursor: pointer; text-decoration: none; color: black"
            id="change-password-user-js">
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
                                <img class="w-75 mb-2" style="border-radius: 10%;" src="" alt=""
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
                                <div class="dropdown d-flex align-items-center w-50 pt-2 pb-2" style="gap: 0 10px;">
                                    <p class="mt-3">List role:</p>
                                    <button class="btn btn-primary dropdown-toggle " type="button" id="role-user-update-js"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="width: 45% !important;">
                                        Role
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="role-user-update-js"
                                        style="overflow: auto !important; height: 150px !important;" id="list-role-js">
                                        <a class="dropdown-item">Admin</a>
                                        <a class="dropdown-item">User</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-2 pb-2" style="gap: 0 10px;">
                                    <p class="align-items-center">Roles:</p>
                                    <ul class="list-group d-flex align-items-center"
                                        style="flex-direction: row !important;gap: 0 10px;overflow-x: auto;
                                        scroll-snap-type: x mandatory;"
                                        id="list-role-user-js">

                                    </ul>
                                </div>

                                <div class="dropdown d-flex align-items-center w-50 pt-2 pb-2" style="gap: 0 10px;">
                                    <p class="mt-3">List permission:</p>
                                    <button class="btn btn-primary dropdown-toggle " type="button"
                                        id="permission-user-update-js" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" style="width: 45% !important;">
                                        Permission
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="permission-user-update-js"
                                        style="overflow: auto !important; height: 150px !important;">
                                        <a class="dropdown-item">Get list user</a>
                                        <a class="dropdown-item">Get user</a>
                                        <a class="dropdown-item">Get list user</a>
                                        <a class="dropdown-item">Get user</a>
                                        <a class="dropdown-item">Get list user</a>
                                        <a class="dropdown-item">Get user</a>
                                        <a class="dropdown-item">Get list user</a>
                                        <a class="dropdown-item">Get user</a>
                                        <a class="dropdown-item">Get list user</a>
                                        <a class="dropdown-item">Get user</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-2 pb-2" style="gap: 0 10px;">
                                    <p class="align-items-center">Permissions:</p>
                                    <ul class="list-group d-flex align-items-center"
                                        style="flex-direction: row !important;gap: 0 10px;overflow-x: auto;
                                        scroll-snap-type: x mandatory;"
                                        id="list-permission-user-js">
                                    </ul>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Created At:</label>
                                    <input type="text" class="form-control" placeholder="Created At..."
                                        value="" readonly id="created_at-user-update-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Updated At:</label>
                                    <input type="text" class="form-control" placeholder="Updated At..."
                                        value="" readonly id="updated_at-user-update-js">
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
    <script src="{{ asset('js/role/index.js') }}"></script>
    <script src="{{ asset('js/role/data.js') }}"></script>
    <script src="{{ asset('js/users/pageDetailUser.js') }}"></script>
@endsection
