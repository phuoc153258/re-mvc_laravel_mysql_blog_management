@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Detail Blog</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img class="w-75 mb-2" style="border-radius: 10%;" alt="" id="show-image-blog-js">
                                <div class="file btn btn-primary" style="position: relative;overflow: hidden;">
                                    Upload
                                    <input type="file" name="file"
                                        style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;"
                                        id="upload-image-blog-js" value="" />
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group mb-3">
                                    <label for="">ID:</label>
                                    <input type="text" class="form-control" placeholder="ID..." value="" readonly
                                        id="id-blog-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Title:</label>
                                    <input type="text" class="form-control" placeholder="Title..." value=""
                                        id="title-blog-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Sub Title:</label>
                                    <textarea class="form-control" rows="3" id="sub_title-blog-js"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Content:</label>
                                    <textarea class="form-control" rows="3" id="content-blog-js"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Username:</label>
                                    <input type="text" class="form-control" id="username-blog-js"
                                        placeholder="Username..." value="" readonly name="username">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Created At:</label>
                                    <input type="text" class="form-control" id="created_at-blog-js"
                                        placeholder="Created At..." value="" readonly name="created_at">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Updated At:</label>
                                    <input type="text" class="form-control" id="updated_at-blog-js"
                                        placeholder="Updated At..." value="" readonly name="updated_at">
                                </div>
                                <div class="d-flex flex-row-reverse mt-4" style="gap: 0 15px;">
                                    <button type="submit" class="btn btn-primary" onclick="updateBlog()">Submit</button>
                                    <a href="/blogs" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/blogs/data.js') }}"></script>
    <script src="{{ asset('js/blogs/file.js') }}"></script>
    <script src="{{ asset('js/blogs/index.js') }}"></script>
    <script src="{{ asset('js/blogs/pageDetailBlog.js') }}"></script>
@endsection
