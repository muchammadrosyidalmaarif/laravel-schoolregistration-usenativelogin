<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Str;
use PDF;
use App\Imports\SiswaImport;

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

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit',['siswa'=> $siswa]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        
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
        //user
       // $userid=$siswa->user_id;
       // $user=User::find($userid);
       // $user->delete($user);
        return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function detail(siswa $siswa)
    {
      
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

    public function export() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportpdf()
    {
        $siswa= Siswa::all();
        $pdf = PDF::loadView('export.datasiswapdf',['siswa'=>$siswa]);
        return $pdf->download('datasiswa.pdf');
    }

    public function importexc(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('importexcel'));
        return redirect('/siswa')->with('sukses', 'Data Berhasil Ditambahkan!');
        
    }
    
}
