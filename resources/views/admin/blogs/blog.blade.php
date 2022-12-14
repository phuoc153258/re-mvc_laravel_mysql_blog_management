@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('view.blog.blog-management') }}</h2>
        <a class="d-flex" style="gap: 0 8px; cursor: pointer; text-decoration: none; color: black" data-toggle="modal"
            data-target="#create-blog-modal-js" onclick="emptyInfoCreateBlog()">
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
                                <th scope="col">{{ __('view.blog.id') }}</th>
                                <th scope="col">{{ __('view.blog.title') }}</th>
                                <th scope="col">{{ __('view.blog.image') }}</th>
                                <th scope="col">{{ __('view.blog.username') }}</th>
                                <th scope="col">{{ __('view.blog.created-at') }}</th>
                                <th scope="col">{{ __('view.blog.updated-at') }}</th>
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

    <div class="modal fade" id="detail-blog-modal-js" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-blog-detail-js">{{ __('view.blog.detail-blog') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="border: none;
                background-color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <img class="w-75 mb-2"
                                                style="border-radius: 10%;display: block;border-radius: 10%;margin-left: auto;margin-right: auto;"
                                                alt="" id="show-image-blog-js">
                                            <div class="file btn btn-primary"
                                                style="position: relative;overflow: hidden;">
                                                {{ __('view.action.upload') }}
                                                <input type="file" name="file"
                                                    style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;"
                                                    id="upload-image-blog-js" value="" />
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.id') }}:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('view.blog.id') }}..." value="" readonly
                                                    id="id-blog-js">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.title') }}:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('view.blog.title') }}..." value=""
                                                    id="title-blog-js">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.sub-title') }}:</label>
                                                <textarea class="form-control" rows="3" id="sub_title-blog-js"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.content') }}:</label>
                                                <textarea class="form-control" rows="3" id="content-blog-js"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.slug') }}:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('view.blog.slug') }}..." value=""
                                                    id="slug-blog-js" readonly>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.username') }}:</label>
                                                <input type="text" class="form-control" id="username-blog-js"
                                                    placeholder="{{ __('view.blog.username') }}..." value=""
                                                    readonly name="username">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.created-at') }}:</label>
                                                <input type="text" class="form-control" id="created_at-blog-js"
                                                    placeholder="{{ __('view.blog.created-at') }}..." value=""
                                                    readonly name="created_at">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.updated-at') }}:</label>
                                                <input type="text" class="form-control" id="updated_at-blog-js"
                                                    placeholder="{{ __('view.blog.updated-at') }}..." value=""
                                                    readonly name="updated_at">
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
                        onclick="updateBlog()">{{ __('view.action.update') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create-blog-modal-js" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('view.blog.create-blog') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="border: none;
                background-color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <img class="w-75 mb-2"
                                                style="border-radius: 10%;display: block;border-radius: 10%;margin-left: auto;margin-right: auto;"
                                                src="/image/image_default.png" alt=""
                                                id="show-image-blog-create-js">
                                            <div class="file btn btn-primary"
                                                style="position: relative;overflow: hidden;">
                                                {{ __('view.action.upload') }}
                                                <input type="file" name="file"
                                                    style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;"
                                                    value="" id="image-blog-create-js"
                                                    onchange="uploadImageBlog(event)" />
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.title') }}:</label>
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('view.blog.title') }}..." value=""
                                                    id="title-create-js">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.sub-title') }}:</label>
                                                <textarea class="form-control" rows="3" id="sub_title-create-js"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('view.blog.content') }}:</label>
                                                <textarea class="form-control" rows="3" id="content-create-js"></textarea>
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
                        onclick="createBlog()">{{ __('view.action.add') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/helper/blogs/file.js') }}"></script>
    <script src="{{ asset('js/helper/blogs/index.js') }}"></script>
    <script src="{{ asset('js/admin/blogs/data.js') }}"></script>
    <script src="{{ asset('js/admin/blogs/pageBlogs.js') }}"></script>
@endsection
