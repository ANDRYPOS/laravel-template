<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //view data
    public function index()
    {
        return view('data.data');
    }

    //view page insert
    public function insert()
    {
        return view('data.insert-data');
    }

    //view report
    public function report()
    {
        return view('data.report');
    }
}
