<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'All Users',
            'users' => User::all(),
        ];

        return view('user.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create User',
        ];

        return view('user.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed',
            ],
            [
                'name.required' => 'Harap isi nama telebih dahulu',
                'username.required' => 'Harap isi username telebih dahulu',
                'password.required' => 'Harap isi password telebih dahulu',
                'password.confirmed' => 'Password tidak sama',
            ]
        );

        $user = new User();

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->password = Hash::make($validated['password']);

        $user->save();

        return redirect('/user')->with('success', 'Success create user');
    }

    public function edit(User $user)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $user
        ];

        return view('user.edit', $data);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
            ],
            [
                'name.required' => 'Harap isi nama telebih dahulu',
                'username.required' => 'Harap isi username telebih dahulu',
            ]
        );

        $user->name = $validated['name'];
        $user->username = $validated['username'];

        $user->save();

        return redirect('/user')->with('success', 'Success update user');
    }

    public function editPassword(User $user)
    {
        $data = [
            'title' => 'Edit User Password',
            'user' => $user
        ];

        return view('user.edit-password', $data);
    }

    public function updatePassword(Request $request, User $user)
    {
        $validated = $request->validate(
            [
                'password' => 'required|confirmed',
            ],
            [
                'password.required' => 'Harap isi password telebih dahulu',
                'password.confirmed' => 'Password tidak sama',
            ]
        );


        $user->password = Hash::make($validated['password']);

        $user->save();

        return redirect('/user')->with('success', 'Success update password user');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/user')->with('success', 'Success delete user');
    }
}
