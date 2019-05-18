
@extends('layouts.app')
@section('title', '| Sistem Informasi Pengajuan Judul')
@section('content')    
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">
                    @foreach ($hitungst as $htstj) 
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">
                                            @if($htstj->st_judul == 0)
                                                Judul Masuk
                                            @elseif($htstj->st_judul >= 0)
                                                {{$htstj->st_judulnya->name_st_judul}} 
                                            @endif
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">{{$htstj->totalst}} </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap">{{$htstj->st_judulnya->keterangan_st_judul}}</span>
                                </p>
                            </div>
                        </div>
                    </div> 
                    @endforeach   
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow card-shadow">
                    <div class="card-header bg-transparent">
                        Judul Baru Masuk
                        <!--@hasanyrole('Admin Prodi||Kaprodi||Dosen')
                            ini admin|kaprodi|dosen
                        @endhasanyrole!-->
                    </div>
                    <div class="card-body">
                        <table class="">
                            @foreach($judulnya as $inijudul)
                            <tr class="thead-ligh">
                                <td style="border-bottom:solid 1px #ccc;"> 
                                    <p title="{{$inijudul->judul}}">
                                        {{Str::limit($inijudul->judul,150)}}
                                    </p>
                                    {{$inijudul->tb_users->username}}-{{$inijudul->tb_users->name}}    
                                </td>
                                <td>
                                
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    
                    <div class="card-footer py-4">
                    aaa
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-list fa-1x"></i>&nbsp;&nbsp; Jenis Judul
                    </div>
                    <div class="card-body">
                        @foreach ($hitungjudul as $htj) 
                        <div class="row">
                            <div class="col-md-7 col-xs-7">{{$htj->jenis_judulnya->jenis_judul}}</div>
                            <div class="col-md-5 col-xs-5 text-right">{{$htj->total}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <img src="http://127.0.0.1/argon/assets/img/theme/team-4-800x800.jpg" class="card-img-top">
                    <div class="card-body">
                        <h1>Jadwal Sempro</h1>
                        <h2>Jadwal Sempro</h2>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card">
                    <img src="http://127.0.0.1/argon/assets/img/theme/team-4-800x800.jpg" class="card-img-top">
                    <div class="card-body">
                        <h1>Jadwal Sempro</h1>
                        <h2>Jadwal Sempro</h2>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card">
                    <img src="http://127.0.0.1/argon/assets/img/theme/team-4-800x800.jpg" class="card-img-top">
                    <div class="card-body">
                        <h1>Jadwal Sempro</h1>
                        <h2>Jadwal Sempro</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        
    </div>
@endsection
@push('script-dynamic')
<script type="text/javascript" charset="utf8" src="{{ asset('js/lib/jquery.dataTables.js') }}"></script>

<script>
    $(document).ready( function () {
        $('#judultable').DataTable({
            "autoWidth" :false,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });    
    } );
</script>

<script type="text/javascript">
     function confirmDelete() {
        return confirm('Are you sure you want to delete?');
     }
</script>
@endpush
