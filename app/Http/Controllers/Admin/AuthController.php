<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('layouts.login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check if the user is an admin
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard')->with('success_message', 'Admin Login Successfully');
            } else {
                return redirect('/')->with('success_message', 'You are logged in as a user.');
            }
        } else {
            return back()->with('error_message', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')
            ->with('error_message', 'Logout Successfully.');
    }
}
