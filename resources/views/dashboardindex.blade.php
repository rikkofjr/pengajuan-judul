
@extends('layouts.app')
@section('title', '| Sistem Informasi Pengajuan Judul')
@section('content')    
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
              <!-- Card stats -->
                <div class="row">
                     Sistem Informasi Pengajuan Judul
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mt--7">
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
        <div class="row">
            @foreach ($hitungjudul as $htj)  
            <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    {{$htj->jenis_judulnya->jenis_judul}}
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    {{$htj->total}}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-list"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-nowrap">xx</span>
                        </p>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow card-shadow">
                    <div class="card-header bg-transparent">
                        ssss
                        @hasanyrole('Admin Prodi||Kaprodi||Dosen')
                            ini admin|kaprodi|dosen
                        @endhasanyrole
                    </div>
                    <div class="card-body table-responsive">
                                  
                    </div>
                    
                    <div class="card-footer py-4">
                        aaa
                    </div>
                </div>
            </div>
        </div>
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
