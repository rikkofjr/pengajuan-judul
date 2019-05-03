{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>Dashboard @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/argon.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/datatable/jquery.dataTables.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="https://use.fontawesome.com/9712be8772.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
</head>
<body>
        
        <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand pt-0" href="dashboard">
                    <img src="{{ asset('img/brand/logo.png') }}" class="navbar-brand-img" alt="..."> Pengajuan Judul
                </a>
                <!-- User -->
                <ul class="nav align-items-center d-md-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-home"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
                                </span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="./examples/profile.html" class="dropdown-item">
                              <i class="ni ni-single-02"></i>
                              <span>My profile</span>
                            </a>
                            <a href="./examples/profile.html" class="dropdown-item">
                              <i class="ni ni-single-02"></i>
                              <span>My profile</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="./index.html">
                                    <img src="./assets/img/brand/blue.png">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form -->
                    <form class="mt-4 mb-3 d-md-none">
                        <div class="input-group input-group-rounded input-group-merge">
                            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                        </li>
                        @hasrole('Admin Prodi')
                        <!-- Navbar utk admin prodi--->
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-book"></i> Post
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                                <a class="dropdown-item" href="/dashboard/posts/">All Post</a>
                                <a class="dropdown-item" href="/dashboard/posts/create">Create Post</a>
                                <a class="dropdown-item" href="/dashboard/posts/myposts/">My Post</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">category</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> User
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                                <a class="dropdown-item" href="/dashboard/users/">Mahasiswa</a>
                                <a class="dropdown-item" href="/dashboard/users/create">Tambah Mahasiswa</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/dashboard/roles">Roles</a>
                                    <a class="dropdown-item" href="/dashboard/permmisions">Permmisions</a>
                            </div>
                        </li>
                        @endrole
                        @hasrole('Admin Prodi||Kaprodi')
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="fas fa-book"></i>
                                <span class="nav-link-text">Judul</span>
                            </a>

                            <div class="collapse" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard/judulditerima">Diterima</a>
                                    </li>
                                    <li class="nav-item">
                                         <a class="nav-link" href="/dashboard/judulditolak">Ditolak</a>
                                    </li>
                                    <li class="nav-item">
                                         <a class="nav-link" href="/dashboard/judultanpastatus">Tanpa Status</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endrole
                        @hasrole('Dosen||Kaprodi')
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/bimbingan">
                                    <i class="fas fa-users"></i> Bimbingan
                                </a>
                            </li>
                        @endrole
                        @hasrole('Mahasiswa')

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#judul-mahasiswa" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="judul-mahasiswa">
                                <i class="fas fa-book"></i>
                                <span class="nav-link-text">Judul</span>
                            </a>

                            <div class="collapse" id="judul-mahasiswa">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard/judul/create">Pengajuan Judul</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard/myjudul">Judul Saya</a>
                                    </li>
                                    <li class="nav-item">
                                         <a class="nav-link" href="/dashboard/judul/">Semua Judul</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endrole
                    </ul>
                </div>
            </div>
        </nav>
       

    <div class="main-content">
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">Tables</a>
                <!-- User -->
                @if (Auth::guest())
                    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('login') }}">Login</a>
                    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('register') }}">Register</a>
                 @else
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="http://127.0.0.1/argon/assets/img/theme/team-4-800x800.jpg">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="/dashboard/myjudul" class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span>Judul</span>
                            </a>
                            <a href="/dashboard/profile/editpassword" class="dropdown-item">
                                <i class="fas fa-key"></i>
                                <span>Edit Password</span>
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="fas fa-sign-out-alt "></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
                @endif
            </div>
        </nav>
        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/argon.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select.min.js') }}"></script>
    @stack('script-dynamic')

</body>
</html>