<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',
    [
        'title' => 'register'
    ]);
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate
       ([
            'name' => 'required',
            'role' => 'min:3',
            'username' => ['required', 'min:3', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5'
       ]);


       $validatedData['password']=Hash::make($validatedData['password']);
       User::create($validatedData);

       $request->session()->flash('success', 'Registration was successful!, Please Login');
       return redirect('/');
    }
}
