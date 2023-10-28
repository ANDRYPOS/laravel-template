<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function index()
    {
        return view('data.data');
    }

    public function report()
    {
        return view('data.report');
    }
}
