<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\ThirdApi;
class FAuthController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register.index');
    }

    public function processRegister(Request $request)
    {
        DB::beginTransaction();

        try {
            if (empty($request->username) || strlen($request->username) > 255) {
                return redirect()->back()->withErrors(['username' => 'Username is required and must not exceed 255 characters.']);
            }

            $cusername = User::where('username', $request->username)->first();
            if ($cusername) {
                return redirect()->back()->withErrors(['username' => 'Username already taken.']);
            }

            if (empty($request->email) || !filter_var($request->email, FILTER_VALIDATE_EMAIL) || strlen($request->email) > 255) {
                return redirect()->back()->withErrors(['email' => 'Invalid email address.']);
            }

            $cemail = User::where('email', $request->email)->first();
            if ($cemail) {
                return redirect()->back()->withErrors(['email' => 'Email already in use.']);
            }

            if (empty($request->password) || strlen($request->password) < 8) {
                return redirect()->back()->withErrors(['password' => 'Password must be at least 8 characters long.']);
            }

            if (empty($request->full_name) || strlen($request->full_name) > 255) {
                return redirect()->back()->withErrors(['full_name' => 'Full name is required and must not exceed 255 characters.']);
            }

            if (empty($request->phone_number) || strlen($request->phone_number) > 15) {
                return redirect()->back()->withErrors(['phone_number' => 'Phone number is required and must not exceed 15 characters.']);
            }

            $result = ThirdApi::createAccount($request->username);

            if ($result['status']) {
                $suser = new User();
                $suser->username = $request->username;
                $suser->email = $request->email;
                $suser->password = bcrypt($request->password);
                $suser->role = 'member';
                $suser->ip_address_register = $request->ip();
                $suser->save();
                $suser->fresh();
    
                $smember = new Member();
                $smember->user_id = $suser->id;
                $smember->ext_username = $suser->username;
                $smember->full_name = $request->full_name;
                $smember->phone_number = $request->phone_number;
                $smember->save();
    
                Auth::login($suser);
                DB::commit();
                return redirect()->route('user.home')->with('success', 'Registration successful and you are now logged in.');
    
            }

            return redirect()->route('user.home')->with('success', 'Registration successful and you are now logged in.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Something went wrong, please try again.']);
        }
    }


    public function login()
    {
        return view('frontend.auth.login.index');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('user.home')->with('success', 'Login successful');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

}
