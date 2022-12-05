<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        try {
            return view('admin.users.user');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function show($id)
    {
        try {
            return view('admin.users.detail_user');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function changePassword(Request $request, $id)
    {
        try {
            return view('admin.users.change_password');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
