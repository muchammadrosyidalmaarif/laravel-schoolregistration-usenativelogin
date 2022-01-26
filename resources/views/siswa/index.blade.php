@extends('layout.master')

@section('content')
@if (session('sukses'))
<div class="alert alert-success" role="alert">
   <i class="far fa-check-circle"></i> {{session('sukses')}}
 </div>  
@endif
  
   <div class="row">
       <div class="col-3">
           <h1>Data Siswa</h1>
       </div>

       @if (auth()->user()->role=='Admin')
       <div class="col-3">
        <a href="/siswa/export" type="button" class="btn btn-primary mb-3">
          <i class="fas fa-download"></i> Download Laporan Excel
        </a>
       </div>
      
       <div class="col-3">
        <a href="/siswa/exportpdf" type="button" class="btn btn-primary mb-3">
          <i class="fas fa-download"></i> Download Laporan PDF
        </a>
       </div>
       @endif
      
       <!--Modal Tambah Siswa-->
       <div class="col-3">

           <!-- Button trigger modal -->@if (auth()->user()->role=='Admin')
           <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus"></i> Tambah Siswa
          </button>
           @endif
               
               
               
       </div>
<div class="table-responsive">
    <table class="table table-striped table-hover" id="tabelSiswa">
        <thead>
        
            <tr class="table-dark">
                <td>Nama Depan</td>
                <td>Nama Belakang</td>
                <td>Jenis Kelamin</td>
                <td>Agama</td>
                <td>Alamat</td>
                @if (auth()->user()->role=='Admin')
            <td>
               Aksi
            </td> 
            @endif
            </tr>
        
        </thead>  
        
        @foreach ($data_siswa as $siswa)
        <tr>
            <td>{{ $siswa->nama_depan }}</td>
            <td>{{ $siswa->nama_belakang }}</td>
            <td>{{ $siswa->jenis_kelamin }}</td>
            <td>{{ $siswa->agama }}</td>
            <td>{{ $siswa->alamat }}</td>
            @if (auth()->user()->role=='Admin')
            <td>
                <a href="/siswa/{{ $siswa->id }}/detail" class="btn btn-warning mb-3"><i class="fas fa-info-circle"></i></a>
                <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-primary mb-3"><i class="far fa-edit"></i></a>
                <a href="#" class="btn btn-danger mb-3 delete" siswa-nama_depan="{{ $siswa->nama_lengkap()}}" siswa-id="{{ $siswa->id }}"><i class="fas fa-trash-alt"></i></a>
            </td> 
            @endif
           
        </tr>
        @endforeach
        
    </table>
</div>    
       
   </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Siswa</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>

       <div class="modal-body">
           <form action="/siswa/create" method="POST" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                 <input type="text" class="form-control  @error('nama_depan') is-invalid @enderror" id="exampleInputEmail1" name="nama_depan" value="{{ old('nama_depan') }}">
                
                 @error('nama_depan')
                   <div class="invalid-feedback">
                     {{$message}}
                   </div>
                  @enderror


                </div>
               <div class="mb-3">
                   <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                   <input type="text" class="form-control  @error('nama_belakang') is-invalid @enderror" id="exampleInputEmail1" name="nama_belakang" value="{{ old('nama_belakang') }}">
                
                   @error('nama_belakang')
                   <div class="invalid-feedback">
                     {{$message}}
                   </div>
                  @enderror
                </div>


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Foto Profil</label>
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" >
                 
                    @error('avatar')
                   <div class="invalid-feedback">
                     {{$message}}
                   </div>
                  @enderror

                </div>

               <div class="mb-3">
                   <label for="exampleInputEmail1" class="form-label">Email</label>
                   <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                
                   @error('email')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                   @enderror
                
                </div>
                 
                 <div class="mb-3">
                   <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>   
                   <select name="jenis_kelamin" class="form-select form-select-md  @error('jenis_kelamin') is-invalid @enderror"  aria-label=".form-select-md example">
                       <option selected>----Pilih Jenis Kelamin----</option>
                       <option value="L" {{ (old('jenis_kelamin') == 'L') ? 'selected' : '' }}>Laki-Laki</option>
                       <option value="P" {{ (old('jenis_kelamin') == 'P') ? 'selected' : '' }}>Perempuan</option>
                     </select>

                     @error('jenis_kelamin')
                     <div class="invalid-feedback">
                       {{$message}}
                     </div>
                    @enderror

                 </div>
                

               <div class="mb-3">
                   <label for="exampleInputEmail1" class="form-label">Agama</label>
                   <input type="text" class="form-control  @error('agama') is-invalid @enderror" id="exampleInputEmail1" name="agama" value="{{ old ('agama') }}">
               
                   @error('agama')
                   <div class="invalid-feedback">
                     {{$message}}
                   </div>
                  @enderror

                </div>

               <div class="mb-3">
                   <div class="form-floating">
                       <textarea class="form-control  @error('alamat') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat" value="{{ old ('alamat') }}"></textarea>
                       <label for="floatingTextarea2">Alamat</label>
                       @error('alamat')
                       <div class="invalid-feedback">
                         {{$message}}
                       </div>
                      @enderror 
                    </div>
                 </div>


               <button type="submit" class="btn btn-primary">Submit</button>
               <button type="reset" class="btn btn-danger">Reset</button>
             </form>
       </div>

   </div>
   </div>
</div>
@section('footer')

<script>
  $(document).ready( function () {
  $('#tabelSiswa').DataTable();
} );
</script>

    <script>
      $('.delete').click(function(){
        var siswa_nama=$(this).attr('siswa-nama_depan');
        var siswa_id=$(this).attr('siswa-id');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover "+siswa_nama+ "'s data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location="/siswa/"+siswa_id+"/delete";
              }
             
          });
      });
    </script>
@endsection

@endsection
    
