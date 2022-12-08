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

    public function verifyEmail()
    {
        try {
            return view('mail.handle_verify_mail');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function changePassword(Request $request)
    {
        try {
            return view('user.users.change_password');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function forgotPassword()
    {
        try {
            return view('auth.passwords.email');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
