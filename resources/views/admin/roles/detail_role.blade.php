@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Detail Role</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="form-group mb-3">
                            <label for="">ID:</label>
                            <input type="text" class="form-control" placeholder="ID..." value="" readonly
                                id="id-role-js">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" placeholder="Name..." value=""
                                id="name-role-js">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Guard Name:</label>
                            <input type="text" class="form-control" placeholder="Guard name..." value=""
                                id="guard-name-role-js">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Created At:</label>
                            <input type="text" class="form-control" id="created_at-role-js" placeholder="Created At..."
                                value="" readonly name="created_at">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Updated At:</label>
                            <input type="text" class="form-control" id="updated_at-role-js" placeholder="Updated At..."
                                value="" readonly name="updated_at">
                        </div>
                        <div class="d-flex flex-row-reverse mt-4" style="gap: 0 15px;">
                            <button type="submit" class="btn btn-primary" onclick="updateRole()">Submit</button>
                            <a href="/blogs" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin/role/data.js') }}"></script>
    <script src="{{ asset('js/admin/role/index.js') }}"></script>
    <script src="{{ asset('js/admin/role/pageDetailRole.js') }}"></script>
@endsection
