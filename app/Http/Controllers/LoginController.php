<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request): RedirectResponse
    {
        // dd($request->all());
        // cek validasi request
        $credentials = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
            ],
            [
                'username.required' => 'Email cannot be empty!',
                'password.required' => 'Password cannot be empty!'
            ]
        );

        // proses
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('toast_success', 'Login successfully');
        }

        // jika invalid
        return back()->withErrors([
            'username' => 'Username not found',
            'password' => 'Wrong password'
        ])->onlyInput(['username', 'password']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
