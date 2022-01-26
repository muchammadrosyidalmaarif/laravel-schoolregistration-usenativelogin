<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login',
    [
        'title' => 'Login'
    ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt( $credentials)) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->with ('loginError', 'Log in Failed');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
