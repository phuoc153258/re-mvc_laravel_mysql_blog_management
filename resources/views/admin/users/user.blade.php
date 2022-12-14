@extends('layouts.app')

@section('content')
    <h2>{{ __('view.user.user-management') }}</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex" style="gap: 0 10px;">
                        <div class="dropdown d-flex align-items-center" style="gap: 0 10px;">
                            <p class="mt-3">{{ __('view.paginate.sort') }}:</p>
                            <a class="btn btn-primary dropdown-toggle w-75 " type="button" id="sort-js"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="">
                                {{ __('view.paginate.defaut') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="sort-js">
                                <a class="dropdown-item"
                                    onclick="setDataSortItem('Default', '')">{{ __('view.paginate.defaut') }}</a>
                                <a class="dropdown-item"
                                    onclick="setDataSortItem('Descending', 'desc')">{{ __('view.paginate.descending') }}</a>
                                <a class="dropdown-item"
                                    onclick="setDataSortItem('Ascending', 'asc')">{{ __('view.paginate.ascending') }}</a>
                            </div>
                        </div>
                        <div class="dropdown d-flex align-items-center" style="gap: 0 10px;">
                            <p class="mt-3">{{ __('view.paginate.entries') }}:</p>
                            <button class="btn btn-primary dropdown-toggle w-75" type="button" id="entries-js"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                5
                            </button>
                            <div class="dropdown-menu" aria-labelledby="entries-js">
                                <a class="dropdown-item" onclick="setDataEntriesItem(5)">5</a>
                                <a class="dropdown-item" onclick="setDataEntriesItem(10)">10</a>
                                <a class="dropdown-item" onclick="setDataEntriesItem(15)">15</a>
                                <a class="dropdown-item" onclick="setDataEntriesItem(20)">20</a>
                                <a class="dropdown-item" onclick="setDataEntriesItem(25)">25</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline d-flex align-items-center" style="gap: 0 10px;">
                        <div class="form-group">
                            <input type="text" class="form-control" id="input-search-user-js"
                                placeholder="{{ __('view.paginate.search') }}..." name="search">
                        </div>
                        <a type="submit" class="btn btn-primary" onclick="getList()">{{ __('view.paginate.search') }} <i
                                class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('view.user.id') }}</th>
                                <th scope="col">{{ __('view.user.username') }}</th>
                                <th scope="col">{{ __('view.user.avatar') }}</th>
                                <th scope="col">{{ __('view.user.created-at') }}</th>
                                <th scope="col">{{ __('view.user.updated-at') }}</th>
                                <th scope="col">{{ __('view.paginate.action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="table-body-js">

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between" style="padding: 0px 16px;" id="pagination-js">
                    <h5 id="total-entries-js"></h5>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
                <input type="number" hidden value="" id="page-input-js">
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail-user-modal-js" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-blog-detail-js">{{ __('view.user.detail-user') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="border: none;
                background-color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between" style="flex-direction: row-reverse; padding: 0px 12px;">
                        <a class="d-flex" style="gap: 0 10px; cursor: pointer; text-decoration: none; color: black"
                            onclick="resetPasswordNotice()">
                            <p>{{ __('view.user.reset-password') }}</p>
                            <i class="fa-solid fa-rotate-right" style="line-height: 1.4"></i>
                        </a>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <img class="w-75 mb-2"
                                                style="border-radius: 10%;display: block;border-radius: 10%;margin-left: auto;margin-right: auto;"
                                                src="" alt="" id="show-avatar-user-js">
                                            <div class="file btn btn-primary"
                                                style="position: relative;overflow: hidden;">
                                                {{ __('view.action.upload') }}
                                                <input type="file" name="file"
                                                    style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;"
                                                    onchange="" value="" id="upload-avatar-user-js" />
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.user.id') }}:</label>
                                                <input type="text" class="form-control" placeholder="ID.."
                                                    value="" readonly id="id-user-update-js">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.user.username') }}:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('view.user.username') }}..." value=""
                                                    readonly id="username-user-update-js">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.user.fullname') }}:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('view.user.fullname') }}..." value=""
                                                    id="fullname-user-update-js">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.user.email') }}:</label>
                                                <input type="email" class="form-control"
                                                    placeholder="{{ __('view.user.email') }}..." value=""
                                                    id="email-user-update-js">
                                            </div>
                                            <div class="dropdown d-flex align-items-center w-50 pt-2 pb-2"
                                                style="gap: 0 10px;">
                                                <p class="mt-auto mb-auto">{{ __('view.user.list-role') }}:</p>
                                                <button class="btn btn-primary dropdown-toggle " type="button"
                                                    id="role-user-update-js" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" style="width: 45% !important;">
                                                    Role
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="role-user-update-js"
                                                    style="overflow: auto !important; height: 150px !important;"
                                                    id="list-role-js">
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center pt-2 pb-2" style="gap: 0 10px;">
                                                <p class="align-items-center mt-auto mb-auto">Roles:</p>
                                                <ul class="list-group d-flex align-items-center"
                                                    style="flex-direction: row !important;gap: 0 10px;overflow-x: auto;
                                                        scroll-snap-type: x mandatory;"
                                                    id="list-role-user-js">

                                                </ul>
                                            </div>

                                            <div class="dropdown d-flex align-items-center w-50 pt-2 pb-2"
                                                style="gap: 0 10px;">
                                                <p class="mt-auto mb-auto">{{ __('view.user.list-permission') }}:</p>
                                                <button class="btn btn-primary dropdown-toggle " type="button"
                                                    id="permission-user-update-js" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="width: 45% !important;">
                                                    Permission
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="permission-user-update-js"
                                                    style="overflow: auto !important; height: 150px !important;"
                                                    id="list-permission-js">
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center pt-2 pb-2" style="gap: 0 10px;">
                                                <p class="align-items-center mt-auto mb-auto">Permissions:</p>
                                                <ul class="list-group d-flex align-items-center"
                                                    style="flex-direction: row !important;gap: 0 10px;overflow-x: auto;
                                                        scroll-snap-type: x mandatory;"
                                                    id="list-permission-user-js">
                                                </ul>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.user.created-at') }}:</label>
                                                <input type="text" class="form-control" placeholder="Created At..."
                                                    value="" readonly id="created_at-user-update-js">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.user.updated-at') }}:</label>
                                                <input type="text" class="form-control" placeholder="Updated At..."
                                                    value="" readonly id="updated_at-user-update-js">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="updateInfoUser()">{{ __('view.action.update') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/helper/users/file.js') }}"></script>
    <script src="{{ asset('js/helper/users/index.js') }}"></script>
    <script src="{{ asset('js/admin/role/index.js') }}"></script>
    <script src="{{ asset('js/admin/permission/index.js') }}"></script>
    <script src="{{ asset('js/admin/role/data.js') }}"></script>
    <script src="{{ asset('js/admin/permission/data.js') }}"></script>
    <script src="{{ asset('js/admin/users/data.js') }}"></script>
    <script src="{{ asset('js/admin/users/pageUsers.js') }}"></script>
@endsection
