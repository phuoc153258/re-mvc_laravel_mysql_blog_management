@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('view.blog.detail-blog') }}</h2>
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
                                    alt="" id="show-image-blog-js">
                                <div class="file btn btn-primary" style="position: relative;overflow: hidden;">
                                    {{ __('view.action.upload') }}
                                    <input type="file" name="file"
                                        style="position: absolute;font-size: 30;opacity: 0; top: 0;right: 0;"
                                        id="upload-image-blog-js" value="" />
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.blog.id') }}:</label>
                                    <input type="text" class="form-control" placeholder="{{ __('view.blog.id') }}..."
                                        value="" readonly id="id-blog-js">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.blog.title') }}:</label>
                                    <input type="text" class="form-control" placeholder="{{ __('view.blog.title') }}..."
                                        value="" id="title-blog-js">
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
                                    <label for="">{{ __('view.blog.username') }}:</label>
                                    <input type="text" class="form-control" id="username-blog-js"
                                        placeholder="{{ __('view.blog.username') }}..." value="" readonly
                                        name="username">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.blog.created-at') }}:</label>
                                    <input type="text" class="form-control" id="created_at-blog-js"
                                        placeholder="{{ __('view.blog.created-at') }}..." value="" readonly
                                        name="created_at">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">{{ __('view.blog.updated-at') }}:</label>
                                    <input type="text" class="form-control" id="updated_at-blog-js"
                                        placeholder="{{ __('view.blog.updated-at') }}..." value="" readonly
                                        name="updated_at">
                                </div>
                                <div class="d-flex flex-row-reverse mt-4" style="gap: 0 15px;">
                                    <button type="submit" class="btn btn-primary"
                                        onclick="updateBlog()">{{ __('view.action.add') }}</button>
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
    <script src="{{ asset('js/admin/blogs/pageDetailBlog.js') }}"></script>
@endsection
