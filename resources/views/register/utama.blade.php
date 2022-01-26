@extends('layoutmaster.layout')
@section('header')
<body>
  <!-- preloader start -->
  <div class="preloader">
    <img src="{{ asset('images-1/preloader.gif') }}" alt="preloader">
  </div>
  <!-- preloader end -->

<!-- header -->
<header class="fixed-top header">
  <!-- top header -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">
          <a class="text-color mr-3" href="callto:+443003030266"><strong>CALL</strong> +44 300 303 0266</a>
          <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
          <ul class="list-inline">
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="notice.html">notice</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#loginModal">login</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#exampleModal">register</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- navbar -->
  @if (session('sukses'))
<div class="alert alert-success" role="alert">
   <i class="far fa-check-circle"></i> {{session('sukses')}}
 </div>  
@endif
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('images-1/logo.png') }}" alt="logo"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item @@courses">
              <a class="nav-link" href="courses.html">COURSES</a>
            </li>
            <li class="nav-item @@events">
              <a class="nav-link" href="events.html">EVENTS</a>
            </li>
            <li class="nav-item @@blog">
              <a class="nav-link" href="blog.html">BLOG</a>
            </li>
            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="teacher.html">Teacher</a>
                <a class="dropdown-item" href="teacher-single.html">Teacher Single</a>
                <a class="dropdown-item" href="notice.html">Notice</a>
                <a class="dropdown-item" href="notice-single.html">Notice Details</a>
                <a class="dropdown-item" href="research.html">Research</a>
                <a class="dropdown-item" href="scholarship.html">Scholarship</a>
                <a class="dropdown-item" href="course-single.html">Course Details</a>
                <a class="dropdown-item" href="event-single.html">Event Details</a>
                <a class="dropdown-item" href="blog-single.html">Blog Details</a>
              </div>
            </li>
            <li class="nav-item @@contact">
              <a class="nav-link" href="contact.html">CONTACT</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                 <i class="far fa-check-circle"></i> {{session('success')}}
               </div>  
              @endif

              @if (session('loginError'))
              <div class="alert alert-danger" role="alert">
                  <i class="fas fa-ban"></i> {{session('loginError')}}
               </div>  
              @endif

                  <div class="col-lg-12">
                      <div class="p-5">
                          <form class="user" action="/postlogin" method="POST">
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                      id="email" aria-describedby="emailHelp"
                                      placeholder="Enter Email Address..." autofocus required value="{{ old('email') }}">

                                  @error('email')
                                  <div class="invalid-feedback">
                                      {{ $message }}    
                                  </div>                                               
                                  @enderror
                                      
                              </div>
                              <div class="form-group">
                                  <input name="password" type="password" class="form-control form-control-user"
                                      id="password" placeholder="Password">
                              </div>
                              <div class="form-group">
                                  <div class="custom-control custom-checkbox small">
                                      <input type="checkbox" class="custom-control-input" id="customCheck">
                                      <label class="custom-control-label" for="customCheck">Remember
                                          Me</label>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary btn-user btn-block">
                                  Login
                              </button>
                              <hr>
                              <a href="index.html" class="btn btn-google btn-user btn-block">
                                  <i class="fab fa-google fa-fw"></i> Login with Google
                              </a>
                              <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                  <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                              </a>
                          </form>
                          <hr>
                          <div class="text-center">
                              <a class="small" href="forgot-password.html">Forgot Password?</a>
                          </div>
                          <div class="text-center">
                              <a class="small" href="/register">Create an Account!</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Register-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Siswa</h5>

      </div>

      <div class="modal-body">
          <form action="/registersiswa" method="POST" enctype="multipart/form-data">
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
                <label  class="form-label">Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
             
                @error('password')
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
                    <label for="floatingTextarea2">Alamat</label>
                      <textarea class="form-control  @error('alamat') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat" value="{{ old ('alamat') }}"></textarea>
                     
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

<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="{{ asset('images-1/banner/banner-1.jpg') }}">
  <div class="container">
    <div class="hero-slider">
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Hey, I love you</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">我爱你</p>
            <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Hey, I love you</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">I hope we can be together someday</p>
            <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Your bright future is our mission</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor
              incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
            <a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /hero slider -->

<!-- banner-feature -->
<section class="bg-gray overflow-md-hidden">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-xl-4 col-lg-5 align-self-end">
        <img class="img-fluid w-100" src="{{ asset('images-1/banner/banner-feature.png') }}" alt="banner-feature">
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="row feature-blocks bg-gray justify-content-between">
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Scholorship News</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Notice Board</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Achievements</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Admission Now</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /banner-feature -->

<!-- about us -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="section-title">About Educenter</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
        <p>cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        <a href="about.html" class="btn btn-primary-outline">Learn more</a>
      </div>
      <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="images/about/about-us.jpg" alt="about image">
      </div>
    </div>
  </div>
</section>
<!-- /about us -->

<!-- courses -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Our Course</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="courses.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    <!-- course list -->
<div class="row justify-content-center">
  <!-- course item -->
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/courses/course-1.jpg" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
          <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">Photography</h4>
        </a>
        <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna.</p>
        <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
      </div>
    </div>
  </div>
  <!-- course item -->
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0" src="{{ asset('images-1/courses/course-2.jpg') }}" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
          <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">Programming</h4>
        </a>
        <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna.</p>
        <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
      </div>
    </div>
  </div>
  <!-- course item -->
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/courses/course-3.jpg" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
          <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">Lifestyle Archives</h4>
        </a>
        <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna.</p>
        <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
      </div>
    </div>
  </div>
  <!-- course item -->
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/courses/course-4.jpg" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
          <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">Complete Freelancing</h4>
        </a>
        <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna.</p>
        <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
      </div>
    </div>
  </div>
  <!-- course item -->
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/courses/course-5.jpg" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
          <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">Branding Design</h4>
        </a>
        <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna.</p>
        <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
      </div>
    </div>
  </div>
  <!-- course item -->
  <div class="col-lg-4 col-sm-6 mb-5">
    <div class="card p-0 border-primary rounded-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/courses/course-6.jpg" alt="course thumb">
      <div class="card-body">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>02-14-2018</li>
          <li class="list-inline-item"><a class="text-color" href="#">Humanities</a></li>
        </ul>
        <a href="course-single.html">
          <h4 class="card-title">Art Design</h4>
        </a>
        <p class="card-text mb-4"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna.</p>
        <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
      </div>
    </div>
  </div>
</div>
<!-- /course list -->
    <!-- mobile see all button -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="courses.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section>
<!-- /courses -->

<!-- cta -->
<section class="section bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h6 class="text-white font-secondary mb-0">Click to Join the Advance Workshop</h6>
        <h2 class="section-title text-white">Training In Advannce Networking</h2>
        <a href="contact.html" class="btn btn-secondary">join now</a>
      </div>
    </div>
  </div>
</section>
<!-- /cta -->

<!-- success story -->
<section class="section bg-cover" data-background="{{ asset('images-1/backgrounds/success-story.jpg') }}">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title">Success Stories</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /success story -->

<!-- events -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Upcoming Events</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="events.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- event -->
  <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card border-0 rounded-0 hover-shadow">
      <div class="card-img position-relative">
        <img class="card-img-top rounded-0" src="images/events/event-1.jpg" alt="event thumb">
        <div class="card-date"><span>18</span><br>December</div>
      </div>
      <div class="card-body">
        <!-- location -->
        <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
        <a href="event-single.html"><h4 class="card-title">Lorem ipsum dolor amet, consectetur adipisicing.</h4></a>
      </div>
    </div>
  </div>
  <!-- event -->
  <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card border-0 rounded-0 hover-shadow">
      <div class="card-img position-relative">
        <img class="card-img-top rounded-0" src="images/events/event-2.jpg" alt="event thumb">
        <div class="card-date"><span>21</span><br>December</div>
      </div>
      <div class="card-body">
        <!-- location -->
        <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
        <a href="event-single.html"><h4 class="card-title">Lorem ipsum dolor amet, consectetur adipisicing.</h4></a>
      </div>
    </div>
  </div>
  <!-- event -->
  <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card border-0 rounded-0 hover-shadow">
      <div class="card-img position-relative">
        <img class="card-img-top rounded-0" src="images/events/event-3.jpg" alt="event thumb">
        <div class="card-date"><span>23</span><br>December</div>
      </div>
      <div class="card-body">
        <!-- location -->
        <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
        <a href="event-single.html"><h4 class="card-title">Lorem ipsum dolor amet, consectetur adipisicing.</h4></a>
      </div>
    </div>
  </div>
</div>
    <!-- mobile see all button -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="course.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section>
<!-- /events -->

<!-- teachers -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title">Our Teachers</h2>
      </div>
      <!-- teacher -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="images/teachers/teacher-1.jpg" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">Jacke Masito</h4>
            </a>
            <p>Teacher</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- teacher -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="images/teachers/teacher-2.jpg" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">Clark Malik</h4>
            </a>
            <p>Teacher</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- teacher -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="images/teachers/teacher-3.jpg" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">John Doe</h4>
            </a>
            <p>Teacher</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /teachers -->

<!-- blog -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Latest News</h2>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- blog post -->
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/blog/post-1.jpg" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0">August 28, 2018</li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0">By Somrat Sorkar</li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
        </a>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
        <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
  <!-- blog post -->
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/blog/post-2.jpg" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0">August 13, 2018</li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0">By Jonathon Drew</li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
        </a>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
        <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
  <!-- blog post -->
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/blog/post-3.jpg" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0">August 24, 2018</li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0">By Alex Pitt</li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
        </a>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
        <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
</div>
  </div>
</section>
<!-- /blog -->

@section('footer')
    
@endsection

@endsection
