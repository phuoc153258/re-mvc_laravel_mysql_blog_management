@extends('layouts.app')

@section('content')
    <h2>User Management</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex" style="gap: 0 10px;">
                        <div class="dropdown d-flex align-items-center" style="gap: 0 10px;">
                            <p class="mt-3">Sort:</p>
                            <a class="btn btn-primary dropdown-toggle w-75 " type="button" id="sort-js"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="">
                                Default
                            </a>
                            <div class="dropdown-menu" aria-labelledby="sort-js">
                                <a class="dropdown-item" onclick="setDataSortItem('Default', '')">Default</a>
                                <a class="dropdown-item" onclick="setDataSortItem('Descending', 'desc')">Descending</a>
                                <a class="dropdown-item" onclick="setDataSortItem('Ascending', 'asc')">Ascending</a>
                            </div>
                        </div>
                        <div class="dropdown d-flex align-items-center" style="gap: 0 10px;">
                            <p class="mt-3">Entries:</p>
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
                            <input type="text" class="form-control" id="input-search-user-js" placeholder="Search..."
                                name="search">
                        </div>
                        <a type="submit" class="btn btn-primary" onclick="getList()">Search <i
                                class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
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
    <script src="{{ asset('js/users/data.js') }}"></script>
    <script src="{{ asset('js/users/file.js') }}"></script>
    <script src="{{ asset('js/users/index.js') }}"></script>
    <script src="{{ asset('js/users/pageUsers.js') }}"></script>
@endsection
