@extends('layouts.app')

@section('title')
| {{ $judul->judul }}
@endsection

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <h1 class="text-white">Edit Judul<br/>
                    <a style="color:#fff;" href="/dashboard/user/{{ $judul->user_judul }}">{{ $judul->tb_users->name }}</a> | 
                    {{ $judul->judul }}
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="container">
                    @if(Auth::guest())
                    
                    @elseif(auth::user()->hasRole('Admin Prodi'))
                        {{ Form::model($judul, array('route' => array('judul.update', $judul->id_judul), 'method' => 'PUT')) }}
                        <div class="form-group">
                        {{ Form::label('judul', 'Judul') }}
                        {{ Form::text('judul', null, array('class' => 'form-control')) }}<br>

                        {{ Form::label('latar_belakang', 'Latar Belakang') }}
                        {{ Form::textarea('latar_belakang', null, array('class' => 'form-control')) }}<br>
                        
                        {{ Form::label('latar_belakang', 'Latar Belakang') }}
                        {{ Form::text('user_judu;', judul->tb_users->name, array('class' => 'form-control')) }}<br>

                        <select name="dp_1" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                            @foreach ($dosen as $dsn1)
                                <option value="{{ $dsn1->id }}">{{ $dsn1->name }}</option>
                            @endforeach
                        </select>

                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                        </div>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection