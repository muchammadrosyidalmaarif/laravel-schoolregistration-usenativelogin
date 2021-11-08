@extends('layout.master')

@section('content')
@if (session('sukses'))
<div class="alert alert-success" role="alert">
   <i class="far fa-check-circle"></i>{{session('sukses')}}
 </div>  
@endif
  <a href="/siswa"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
   <div class="row">
       <thead> <h1>Form Edit Siswa</h1></thead>
      
       <form action="/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
             <input type="text" class="form-control" id="exampleInputEmail1" name="nama_depan" 
             value="{{ $siswa->nama_depan }}"> 
           </div>
           <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
               <input type="text" class="form-control" id="exampleInputEmail1" name="nama_belakang"
               value="{{ $siswa->nama_belakang }}">
             </div>
             
             <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>   
               <select name="jenis_kelamin" class="form-select form-select-md" aria-label=".form-select-md example">
                   <option selected>----Pilih Jenis Kelamin----</option>
                   <option value="L" @if($siswa->jenis_kelamin=='L') selected @endif>Laki-Laki</option>
                   <option value="P" @if($siswa->jenis_kelamin=='P') selected @endif>Perempuan</option>
                 </select>
             </div>
            

           <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Agama</label>
               <input type="text" class="form-control" id="exampleInputEmail1" name="agama" value="{{ $siswa->agama }}">
           </div>

           
           <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Alamat</label>
               <textarea class="form-control" name="alamat">{{ $siswa->alamat }}</textarea>
             </div>
             
           <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Avatar</label>
               <input type="file" name="avatar" class="form-control" >
             </div>

           <button type="submit" class="btn btn-warning">Update</button>
           <button type="reset" class="btn btn-danger">Reset</button>
         </form>
   </div>

@endsection
     