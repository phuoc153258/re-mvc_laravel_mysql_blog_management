<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BlogController extends Controller
{
    function index(Request $request)
    {
        try {
            return view('blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function show($id)
    {
        try {
            return view('detail_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function create()
    {
        try {
            return view('create_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
