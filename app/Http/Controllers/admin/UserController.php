<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        $users = User::all();
        return view('admin.users.index', compact('users','roles'));
    }

    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_user' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,employee,user',
        ]);

        User::create([
            'name_user' => $request->name_user,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'password' => $request->password,

            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Người dùng đã được thêm.');
    }

    public function edit(User $user)
    {
        $roles=Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,employee,user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name_user' => $request->name_user,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            // $data['password'] = bcrypt($request->password);
            $data['password'] = $request->password;

        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Người dùng đã được xóa.');
    }
}
