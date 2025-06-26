<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'id_role' => 'required|exists:roles,id_role',
        ]);

        $user->id_role = $request->id_role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Role user berhasil diperbarui.');
    }
}
