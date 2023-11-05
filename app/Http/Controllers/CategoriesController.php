<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        $category = Categories::all();
        return view('categories.categories', compact(['user', 'category']));
    }

    public function insert()
    {
        $user = User::all();
        return view('categories.insert-categories', compact(['user']));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Cannot be empty!',
            'min' => 'Minimal 2 karakter',
            'unique' => 'The name is already in use!',
        ];
        $request->validate(
            [
                'name' => 'required|min:2|unique:categories,name',
            ],
            $message
        );

        // ambil request input
        $namaCategories = $request->name;

        // cek ke database apakah data sudah ada
        $cekDB = Categories::where('name', '=', $namaCategories)->count();

        // eksekusi kondisi
        if (!$cekDB) {
            // jika nama belum digunakan maka lanjutkan insert
            $categories = Categories::create([
                'name' => $namaCategories,
                'created_by' => Auth::user()->id,
                'update_by' => Auth::user()->id,
            ]);
            return redirect('/categori')->with('toast_success', 'Data Saved Successfully');
        }
    }

    public function edit($id)
    {
        $category = Categories::where('id', $id)->get();
        return view('categories.edit-categories', compact(['category']));
    }

    public function update(Request $request)
    {
        //
        /* dd($request->all()); */

        // validation
        $message = [
            'required' => 'Cannot be empty!',
            'min' => 'Minimal 2 karakter',
        ];

        $request->validate(
            [
                'name' => 'required|min:2',
            ],
            $message
        );

        // ambil request input
        $namaCategories = $request->name;

        // cek ke database apakah data sudah ada
        $cekDB = Categories::where('name', '=', $namaCategories)->count();
        if (!$cekDB) {
            $categories = Categories::find($request->id)->update([
                'name' => $request->name,
                'created_by' => $request->create,
                'update_by' => Auth::user()->id,
            ]);
            return redirect('/categori')->with('toast_success', 'Data Successfully Updated');
        }
        // jika sudah digunakan maka gagal update
        return redirect('/categori')->with('toast_success', 'No Data Updates');
    }

    public function destroy($id)
    {
        // dd($id);
        // get data berdasarkan id categroeis dan delete
        $categories = Categories::find($id)->delete();

        // jika berhasil maka tampil notifikasi berhasil
        if ($categories) {
            return redirect('/categori')->with('toast_success', 'Data Deleted Successfully');
        }

        // jika gagal maka tampil notifikasi gagal
        return redirect('/categori')->with('error', 'Gagal hapus!');
    }
}
