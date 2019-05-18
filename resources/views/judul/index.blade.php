
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
                        ssss
                        @hasanyrole('Admin Prodi||Kaprodi||Dosen')
                            ini admin|kaprodi|dosen
                        @endhasanyrole
                    </div>
                        <div class="card-body table-responsive">
                            <table id="judultable" class="table table-bordered" style="max-width:300px;">
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
                                    @hasrole('Admin Prodi')
                                        <button type="button" onclick="window.location.href='/dashboard/judul/{{$jdl->id_judul}}/edit'" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-eye"></i></button>
                                        <button type="button" onclick="confirmDelete()" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    @endhasrole
                                    @hasrole('Kaprodi')
                                        Ini hasil kaprodi
                                    @endhasrole
                                    @if($jdl->user_judul == Auth::User()->id)
                                        Ini punya saya
                                    @endif
                                        
                                    </td>
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
