
@extends('layouts.app')
@section('title', '| Judul Mahasiswa')
@section('content')    
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
              <!-- Card stats -->
                <div class="row">
                    <h1>Judul Mahasiswa</h1>
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
                    </div>
                        <div class="card-body table-responsive">
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@endsection
@push('script-dynamic')
<script>
    $(document).ready( function () {
        $('#judultable').DataTable({
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
