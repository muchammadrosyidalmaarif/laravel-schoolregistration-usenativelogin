<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',
    [
        'title' => 'register'
    ]);
    }

   
    public function create(Request $request)
    {
      $this->validate($request,
       [
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required|min:3',
            'avatar' => 'mimes:jpg,png',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5',
            'jenis_kelamin' => 'required',
            'agama' => 'required|min:5',
            'alamat' => 'required|min:5'
       ]);

        //insert tabel user
        $user = new User();
        $user->role = 'Siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->username = $request->nama_depan;
        $user->password = bcrypt ($request->password);
        $user->remember_token= Str::random(40);
        $user->save(); 
        
          //insert tabel siswa
        $request->request->add(['user_id'=>$user->id]);
        $siswa = Siswa::create($request->all());
        if($request->hasFile('avatar'))
        {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar =  $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        
        return redirect('/')->with('sukses', 'Pendaftaran Berhasil!');
    }
}
