<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //view data
    public function index()
    {
        $data = Data::all();
        return view('data.data', compact(['data']));
    }

    //view page insert
    public function insert()
    {
        $category = Categories::all();
        $user = User::all();
        return view('data.insert-data', compact(['category', 'user']));
    }

    //view report
    public function report()
    {
        return view('data.report');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
