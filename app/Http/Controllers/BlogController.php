<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BlogController extends Controller
{
    function indexAdmin(Request $request)
    {
        try {
            return view('admin.blogs.blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function indexUser(Request $request)
    {
        try {
            return view('user.blogs.blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function showAdmin($id)
    {
        try {
            return view('admin.blogs.detail_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function showUser($id)
    {
        try {
            return view('admin.blogs.detail_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function createAdmin()
    {
        try {
            return view('admin.blogs.create_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    function createUser()
    {
        try {
            return view('admin.blogs.create_blog');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
