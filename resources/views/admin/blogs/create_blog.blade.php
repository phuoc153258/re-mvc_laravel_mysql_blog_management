@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('view.blog.create-blog') }}</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 text-center">
                                <img class="w-75 mb-2"
                                    style="border-radius: 10%;display: block;border-radius: 10%;margin-left: auto;margin-right: auto;"
                                    src="/image/image_default.png    " alt="" id="show-image-blog-create-js">

                                <div class="file btn btn-primary" style="position: relative;overflow: hidden;">
                                    {{ __('view.action.upload') }}
                                    <input type="file" name="file"
                                        style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;" value=""
                                        id="image-blog-create-js" onchange="uploadImageBlog(event)" />
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.blog.title') }}:</label>
                                    <input type="text" class="form-control" placeholder="{{ __('view.blog.title') }}..."
                                        value="" id="title-create-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.blog.sub-title') }}:</label>
                                    <textarea class="form-control" rows="3" id="sub_title-create-js"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.blog.content') }}:</label>
                                    <textarea class="form-control" rows="3" id="content-create-js"></textarea>
                                </div>
                                <div class="d-flex flex-row-reverse mt-4" style="gap: 0 15px;">
                                    <a class="btn btn-primary" onclick="createBlog()">{{ __('view.action.add') }}</a>
                                    <a href="/blogs" class="btn btn-secondary">{{ __('view.action.back') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin/blogs/data.js') }}"></script>
    <script src="{{ asset('js/helper/blogs/file.js') }}"></script>
    <script src="{{ asset('js/helper/blogs/index.js') }}"></script>
    <script src="{{ asset('js/admin/blogs/pageCreateBlog.js') }}"></script>
@endsection
