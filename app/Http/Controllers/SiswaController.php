<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari'))
        {
            $data_siswa = Siswa::where('nama_depan', 'LIKE', '%' .$request->cari. '%')->get();
        }else
        {
            $data_siswa = Siswa::all();
        }
        
        return view('siswa.index', 
        [
        'data_siswa' => $data_siswa
    
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
        $user->password = bcrypt ('12345');
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
        
        return redirect('/siswa')->with('sukses', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $siswa= Siswa::find($id);
        return view('siswa.edit',['siswa'=> $siswa]);
    }

    public function update(Request $request, $id)
    {
        $siswa=Siswa::find($id);
        $siswa->update($request->all());  
        if($request->hasFile('avatar'))
        {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar =  $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Diupdate!');
    }

    public function delete($id)
    {
        $siswa=Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function detail($id)
    {
        $siswa=Siswa::find($id);
        $pelajaran=Mapel::all();
        return view('siswa.detailsiswa', 
        [
            'siswa' => $siswa,
            'pelajaran' => $pelajaran
        ]
    );
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->attach($request->mapel,
        [
            'nilai' => $request->nilai
        ]
    );

        return redirect('siswa/' .$idsiswa. '/detail')->with('sukses', 'Nilai Berhasil Ditambahkan!');
    }
}
