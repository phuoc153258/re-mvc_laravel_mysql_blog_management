<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        try {
            return view('admin.roles.role');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function show()
    {
        try {
            return view('admin.roles.detail_role');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function create()
    {
        try {
            return view('admin.roles.create_role');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
