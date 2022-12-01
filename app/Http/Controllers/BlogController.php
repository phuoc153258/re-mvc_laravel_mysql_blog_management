<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BlogController extends Controller
{
    function index(Request $request)
    {
        try {
            return view('blogs.blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function show($id)
    {
        try {
            return view('blogs.detail_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function create()
    {
        try {
            return view('blogs.create_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
