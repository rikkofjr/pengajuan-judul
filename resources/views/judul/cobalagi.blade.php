@extends('layouts.elaadmin')
@section('title', '| Judul Mahasiswa')
@section('content')
<!--
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
              <-- Card stats --
                <div class="row">
                    <h1>Judul Mahasiswa</h1>
                </div>
            </div>
        </div>
    </div>
    --->
    <div class="right-panel">
    <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="row">
                <div class="col">
                    <div class="card shadow card-shadow">
                        <div class="card-header bg-transparent">
                            ssss
                        </div>
                        <div class="card-body">
                            <table id="judultable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Judul</td>
                                        <td>Jenis</td>
                                        <td>Mahasiswa</td>
                                        <td>dp_1</td>
                                        <td>dp_2</td>
                                        <td>st_judul</td>
                                    </tr>
                                </thead>
                                <?php $no = 1;?>
                                <tbody>
                                    @foreach($judulnya as $jdl)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $jdl->judul }}</td>
                                        <td>{{ $jdl->jenis_penelitian }}</td>
                                        <td>{{ $jdl->tb_users->name }}</td>
                                        <td>{{ $jdl->dp_1nya->name }}</td>
                                        <td>{{ $jdl->dp_2nya->name }}</td>
                                        <td>{{ $jdl->st_judul }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            aaa
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/main.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="http://127.0.0.1/elaadmin/assets/js/init/datatables-init.js"></script>
<script type="text/javascript">
        $(document).ready( function () {
    $('#judultable').DataTable();
} );
</script>



