<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'userCount' => User::get()->count()
        ];

        return view('home', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $validated = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Harap isi username terlebih dahulu',
                'password.required' => 'Harap isi password terlebih dahulu',
            ]
        );

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'errorLogin' => 'Invalid username or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
