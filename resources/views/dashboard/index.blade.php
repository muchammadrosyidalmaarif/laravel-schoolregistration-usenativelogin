@extends('layout.master')

@section('content')

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-sm-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{ auth()->user()->name }}</h1>
                    <p class="mb-4"><div class="border-left-info">
                   
                    </div></p>
                  </div>
                    <h5 class="text-muted text-center">{{ auth()->user()->role }}</h5>
                  <hr />
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection