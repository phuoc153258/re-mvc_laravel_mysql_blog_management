<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(Request $request)
    {
        try {
            return view('admin.blogs.blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function show($id)
    {
        try {
            return view('admin.blogs.detail_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function create()
    {
        try {
            return view('admin.blogs.create_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
