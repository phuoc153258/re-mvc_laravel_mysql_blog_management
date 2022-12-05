<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('user.users.user');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function show($id)
    {
        try {
            return view('user.users.detail_user');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function changePassword(Request $request, $id)
    {
        try {
            return view('user.users.change_password');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
