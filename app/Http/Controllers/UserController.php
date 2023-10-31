<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.user-setting');
    }
    public function insert()
    {
        return view('auth.insert-user');
    }
}
