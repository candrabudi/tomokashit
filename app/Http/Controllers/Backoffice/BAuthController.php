<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BAuthController extends Controller
{
    public function login()
    {
        return view('backoffice.auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('system.dashboard')->with('success', 'Login successful');
        }

        session()->flash('error', 'Maaf username / password salah.');
        return back()->with('error', 'Mohon maaf username / password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully.'], 200);
    }
}
