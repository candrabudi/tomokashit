<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('backoffice.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('system.profile.index')->with('success', 'Profile updated successfully.');
    }
}
