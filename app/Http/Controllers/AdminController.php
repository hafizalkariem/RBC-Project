<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Logic to display admin dashboard
    }

    public function manageUsers()
    {
        // Logic to manage users
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showUser($id)
    {
        // Logic to show a specific user
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function editUser($id)
    {
        // Logic to edit a specific user
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // Logic to update a specific user
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        // Logic to delete a specific user
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}