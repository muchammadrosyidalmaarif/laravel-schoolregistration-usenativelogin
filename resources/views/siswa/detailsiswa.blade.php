@extends('layout.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<style>
          .glyphicon-ok:before {
        content: "\f00c";
    }
    .glyphicon-remove:before {
        content: "\f00d";
    }
    .glyphicon {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>
@endsection

@section('content')
<a href="/siswa"><i class="fas fa-arrow-circle-left fa-2x mb-3"></i></a>
<div class="card mb-3 justify-content-center">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ $siswa->getAvatar() }}" class="img-fluid rounded-start mb-2" alt="...">
        
        
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}</h5>
          <p class="card-text">
              <ul>
                  <li>Jenis Kelamin : {{ $siswa->jenis_kelamin }}</li>
                  <li>Agama : {{ $siswa->agama }}</li>
                  <li>Alamat : {{ $siswa->alamat }}</li>
              </ul>
          </p>
        <a class="btn btn-warning mb-2" href="/siswa/{{ $siswa->id }}/edit"><i class="far fa-edit"></i> Edit Profil</a>
        <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#tambahnilai">
          <i class="fas fa-plus"></i> Tambah Nilai
        </button>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                
                    <tr class="table-dark">
                        <td>Mata Pelajaran</td>
                        <td>Semester</td>
                        <td>Nilai</td>
                        <td>Guru Pengampu</td>
                    </tr>
                
                </thead>  
                
                @foreach ($siswa->mapel as $mapel)
                <tr>
                    <td>{{ $mapel->nama }}</td>
                    <td>{{ $mapel->semester }}</td>
                    <td><a href="#" class="nilai" data-type="text" data-pk="{{ $mapel->id }}" data-url="/api/siswa/{{ $siswa->id }}/editnilai" data-title="Enter Nilai ">{{ $mapel->pivot->nilai }}</a></td>  
                    <td>{{ $mapel->guru->nama }}</td>
                </tr>
              @endforeach
                
            </table>
        </div>    
              
       
        </div>
      </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="tambahnilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/siswa/{{ $siswa->id }}/addnilai" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          @if (session('sukses'))
          <div class="alert alert-success" role="alert">
            <i class="far fa-check-circle"></i> {{session('sukses')}}
          </div>  
          @endif
          <div class="mb-3">
            <label for="mapel" class="form-label">Mata Pelajaran</label>   
            <select id="mapel" name="mapel" class="form-select form-select-md  @error('mapel') is-invalid @enderror"  aria-label=".form-select-md example">
                
              @foreach ($pelajaran as $mp)
              <option value="{{ $mp->id }}">{{ $mp->nama }}</option>
              @endforeach
              
              
              </select>

              @error('mapel')
              <div class="invalid-feedback">
                {{$message}}
              </div>
             @enderror

          </div>


          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nilai</label>
            <input type="text" class="form-control  @error('nilai') is-invalid @enderror" id="exampleInputEmail1" name="nilai" value="{{ old('nilai') }}">
           
            @error('nilai')
              <div class="invalid-feedback">
                {{$message}}
              </div>
             @enderror

           </div>
  

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
             <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          
        </form>
      </div>
     
    </div>
  </div>
</div>
       

@endsection

@section('footer')
<script> $(document).ready(function() {
  $('.nilai').editable({
      mode: 'inline',
  });
  $('.hours').editable({
      mode: 'inline',
      type: 'number',
      step: '1.00',
      min: '0.00',
      max: '24'
  });
});</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
@endsection