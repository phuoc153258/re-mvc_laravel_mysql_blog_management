@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>Create Blog</h2>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img class="w-75 mb-2" style="border-radius: 10%;" src="/image/image_default.png    "
                                    alt="" id="show-image-blog-create-js">

                                <div class="file btn btn-primary" style="position: relative;overflow: hidden;">
                                    Upload
                                    <input type="file" name="file"
                                        style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;" value=""
                                        id="image-blog-create-js" onchange="uploadImageBlog(event)" />
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group mb-3">
                                    <label for="">Title:</label>
                                    <input type="text" class="form-control" placeholder="Title..." value=""
                                        id="title-create-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Sub Title:</label>
                                    <textarea class="form-control" rows="3" id="sub_title-create-js"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Content:</label>
                                    <textarea class="form-control" rows="3" id="content-create-js"></textarea>
                                </div>
                                <input type="text" id="user_id-create-js" value="{{ Auth::user()->id }}" hidden>
                                <div class="d-flex flex-row-reverse mt-4" style="gap: 0 15px;">
                                    <a class="btn btn-primary" onclick="createBlog()">Submit</a>
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
@endsection
