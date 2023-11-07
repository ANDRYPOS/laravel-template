<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * tampil data user
     */
    public function index()
    {
        $user = User::all();
        return view('auth.user-setting', compact(['user']));
    }

    /**
     * tampil halaman insert user
     */
    public function insert()
    {
        return view('auth.insert-user');
    }

    /**
     * simpan user
     */
    public function store(Request $request)
    {
        // validation
        $message = [
            'required' => 'Cannot be empty!',
            'unique' => 'Email already used!',
            'email' => 'Must be accompanied @',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numeric',
            'mimes' => 'Format not found: jpeg,png,jpg',
            'max' => 'Maximum 2 Mb',
        ];
        $request->validate(
            [
                'email' => 'required|email',
                'username' => 'required|min:1',
                'name' => 'required|min:2',
                'role' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'password' => 'required|min:2',
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2024',
            ],
            $message
        );

        // convert nama file
        $imageName = 'avatar_user_' . time() . '.' . $request->avatar->getClientOriginalExtension();

        // masukkan file ke storgae
        $path = Storage::putFileAs('public/avatars', $request->file('avatar'), $imageName);

        // create data user ke database
        $users = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'avatar' => $imageName,
        ]);
        return redirect('/user')->with('toast_success', 'Data Saved Successfully');
    }

    public function edit($id)
    {
        // get data user berdasarkan id
        $users = User::where('id', $id)->get();

        // pashing data ke view
        return view('auth.edit-user', compact('users'));
    }

    public function update(Request $request)
    {
        // validation
        $message = [
            'required' => 'Cannot be empty!',
            'unique' => 'Email already used!',
            'email' => 'Must be accompanied @',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numeric',
            'mimes' => 'Format not found: jpeg,png,jpg',
            'max' => 'Maximum 2 Mb',
        ];
        $request->validate(
            [
                'name' => 'required|min:2',
                'username' => 'required|min:1',
                'role' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required|min:2',
                'password' => 'required|min:2',
            ],
            $message
        );

        // get user berdasarkan id
        $users = User::where('id', $request->id)->first();

        // cek jika update file
        if ($request->hasFile('avatar')) {

            // hapus file
            $delete = Storage::delete('public/avatars/' . $users->avatar);

            // upload file baru
            $name = $request->file('avatar');
            $imageName = 'avatar_user_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/avatars', $request->file('avatar'), $imageName);
            $users->update([
                'avatar' => $imageName
            ]);
        }
        // update data
        $users->update([
            'email' => $request->email,
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
        ]);

        return redirect('/user')->with('toast_success', 'Data Successfully Updated');
    }

    public function destroy($id)
    {
        // get data user berdasarkan id
        $users = User::find($id);

        // delete file dari storage
        $delete = Storage::delete('public/avatars/' . $users->avatar);

        // delete data pada databsae
        $users->delete();
        return redirect('/user')->with('toast_success', 'Data Deleted Successfully');
    }
}
