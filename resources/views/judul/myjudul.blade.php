
@extends('layouts.app')
@section('title', '| Judul Mahasiswa')
@section('content')    
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
              <!-- Card stats -->
                <div class="row">
                    @if(Session::has('flash_message'))
                        <p class="alert alert-info"><h1>{{ Session::get('flash_message') }}</h1></p>
                    @endif<br/>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow card-shadow">
                    <div class="card-header bg-transparent">
                        {{Auth::user()->name}}<br/>
                        <i><b>{{Auth::user()->username}}</b></i>
                        @hasanyrole('Admin Prodi||Kaprodi||Dosen')
                            ini admin|kaprodi|dosen
                        @endhasanyrole
                    </div>
                        <div class="card-body table-responsive">
                            <h1>Identitas </h1>
                            <div class="row" style="background:#f2f4fb;margin:30px 0px;">
                                <div class="col-md-4">
                                    <img src="http://127.0.0.1/argon/assets/img/theme/team-4-800x800.jpg" width="100%" class="mx-auto d-block">
                                </div>
                                <div class="col-md-7 main align-items-center margin-content" style="background:none;padding:20px 0px;">
                                    Nim : {{Auth::user()->username}} <br/>
                                    Nama : {{Auth::user()->name}}<br/>
                                    Email : {{Auth::user()->email}} <br/>
                                    <div style="bottom:0px;">aaa</div>
                                </div>
                            </div>
                            @hasrole('Mahasiswa')
                            <h1>Judul</h1>
                            
                            <table id="judultable" class="table table-bordered">
                            <thead>
                                 <tr>
                                    <td>#</td>
                                    <td width="400px">Judul</td>
                                    <td>Mahasiswa</td>
                                    <td>dp_1</td>
                                    <td>dp_2</td>
                                    <td>st_judul</td>
                                    <td>Act</td>
                                 </tr>
                            </thead>
                            <?php $no = 1;?>
                            
                            <tbody>
                             @foreach($judul as $jdl)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        {{ $jdl->judul }}<br/>
                                        {{ $jdl->jenis_penelitian }}
                                    </td>
                                    <td>{{ $jdl->tb_users->name }}</td>
                                    <td>{{ $jdl->dp_1nya->name }}</td>
                                    <td>{{ $jdl->dp_2nya->name }}</td>
                                    <td>{{ $jdl->st_judulnya->name_st_judul }}</td>
                                    <td>
                                        <button type="button" onclick="window.location.href='/dashboard/judul/{{$jdl->id_judul}}/'" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-eye"></i></button>                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endhasrole
                        </div>
                    
                    <div class="card-footer py-4">
                        
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
@endpush
