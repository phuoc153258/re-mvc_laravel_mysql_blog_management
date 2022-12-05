<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(Request $request)
    {
        try {
            return view('user.blogs.blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function show($id)
    {
        try {
            return view('user.blogs.detail_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function create()
    {
        try {
            return view('user.blogs.create_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
