<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        try {
            return view('admin.permissions.permission');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function show()
    {
        try {
            return view('admin.permissions.detail_permission');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function create()
    {
        try {
            return view('admin.permissions.create_permission');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
