<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BUserManagementController extends Controller
{
    public function index(Request $request)
    {
        // Fetch users with pagination (excluding superadmin)
        $users = User::where('role', '!=', 'member')->paginate(10);
    
        return view('backoffice.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,member',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)  // Use ID instead of User object
    {
        $user = User::findOrFail($id);  // Fetch the user by ID

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,member',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);  // Fetch the user by ID
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
