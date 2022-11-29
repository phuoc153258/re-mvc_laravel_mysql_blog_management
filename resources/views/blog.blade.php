@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Blog Management</h2>
        <a class="d-flex" style="gap: 0 8px; cursor: pointer; text-decoration: none; color: black" href="/blogs/create">
            <p>Add blog</p>
            <i class="fa-solid fa-plus" style="line-height: 1.5"></i>
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex" style="gap: 0 10px;">
                        <div class="dropdown d-flex align-items-center" style="gap: 0 10px;">
                            <p class="mt-3">Sort:</p>
                            <a class="btn btn-primary dropdown-toggle w-75 " type="button" id="sort-js"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="">
                                @if ($sort == 'asc')
                                    Ascending
                                @elseif ($sort == 'desc')
                                    Descending
                                @else
                                    Default
                                @endif
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
                                {{ $limit }}
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

                    <form class="form-inline d-flex align-items-center" style="gap: 0 10px;" method="GET" action="/blogs">
                        <div class="form-group">
                            <input type="text" class="form-control" id="input-search-user-js" placeholder="Search..."
                                name="search">
                        </div>
                        <a type="submit" class="btn btn-primary" onclick="getListUser()">Search<i
                                class="fa-solid fa-magnifying-glass"></i></a>
                    </form>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Username</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-body-js">
                            @foreach ($data as $blog)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td class="w-25"><img src="{{ $blog->image }}" class="w-50" alt="Avatar..."></td>
                                    <td>{{ $blog->username }}</td>
                                    <td>{{ formatDate($blog->created_at) }}</td>
                                    <td>{{ formatDate($blog->updated_at) }}</td>
                                    <td><a href="/blogs/{{ $blog->id }}" style="margin-right: 10px;"><i
                                                class="fa-solid fa-pencil"></i></a><a href="#"
                                            onclick="deleteBlogNotice('{{ $blog->id }}','{{ $blog->title }}')"><i
                                                class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between" style="padding: 0px 16px;" id="pagination-js">
                    <h5>Total: {{ $total }} entries</h5>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if ($page <= 1 || $last_page <= 1)
                            @else
                                <li class="page-item" onclick="setDataPageItem({{ $page - 1 }})"><a
                                        class="page-link">Previous</a>
                                </li>
                            @endif
                            @for ($i = 1; $i <= $last_page; $i++)
                                @if ($i == $page)
                                    <li class="page-item" onclick="setDataPageItem({{ $i }})"><a
                                            class="page-link text-dark bg-primary">{{ $i }}</a>
                                    </li>
                                @else
                                    <li class="page-item" onclick="setDataPageItem({{ $i }})"><a
                                            class="page-link">{{ $i }}</a></li>
                                @endif
                            @endfor
                            @if ($page >= $last_page)
                            @else
                                <li class="page-item" onclick="setDataPageItem({{ $i }})"><a
                                        class="page-link">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <input type="number" hidden value="{{ $page }}" id="page-input-js">
            </div>
        </div>
    </div>

    <script src="{{ asset('js/helper/index.js') }}"></script>
    <script src="{{ asset('js/blogs/data.js') }}"></script>
    <script src="{{ asset('js/blogs/index.js') }}"></script>
@endsection
