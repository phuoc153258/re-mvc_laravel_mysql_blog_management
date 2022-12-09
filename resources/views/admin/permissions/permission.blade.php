@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('view.permission.permission-management') }}</h2>
        <a class="d-flex" style="gap: 0 8px; cursor: pointer; text-decoration: none; color: black"
            href="/admin/permissions/create">
            <p>{{ __('view.action.add') }}</p>
            <i class="fa-solid fa-plus" style="line-height: 1.5"></i>
        </a>
    </div>
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
                        <a class="btn btn-primary" onclick="getList()">{{ __('view.paginate.search') }}<i
                                class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('view.permission.id') }}</th>
                                <th scope="col">{{ __('view.permission.name') }}</th>
                                <th scope="col">{{ __('view.permission.created-at') }}</th>
                                <th scope="col">{{ __('view.permission.updated-at') }}</th>
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
    <script src="{{ asset('js/admin/permission/index.js') }}"></script>
    <script src="{{ asset('js/admin/permission/data.js') }}"></script>
    <script src="{{ asset('js/admin/permission/pagePermission.js') }}"></script>
@endsection
