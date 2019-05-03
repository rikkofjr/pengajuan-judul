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
                        {{ Form::model($judul, array('route' => array('judul.update', $judul->id_judul), 'method' => 'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('judul', 'Judul') }}
                            {{ Form::text('judul', null, array('class' => 'form-control')) }}<br>
                        </div>
                        <div class="form-group">
                            {{ Form::label('latar_belakang', 'Latar Belakang') }}
                            {{ Form::textarea('latar_belakang', null, array('class' => 'form-control')) }}<br>
                        </div>
                        {{$judul->dp_1nya->name}}<br/>
                        {{$judul->dp_2nya->name}}<br/>
                    @if(auth::user()->hasRole('Admin Prodi', 'Kaprodi'))
                        <select name="dp_1" class="form-control">
                                @if($judul->dp_1 == 0)
                                    <option value="0" Selected hidden>Pilih Dosen</option>
                                @endif
                            @foreach ($dosen as $dsn1)
                                <option value="{{ $dsn1->id }}" @if($dsn1->id == $judul->dp_1)Selected @endif>{{ $dsn1->name}}</option> 
                            @endforeach
                        </select>
                        <br/>
                        <select name="dp_2" class="form-control">
                                @if($judul->dp_2 == 0)
                                    <option value="0" Selected hidden>Pilih Dosen</option>
                                @endif
                            @foreach ($dosen as $dsn2)
                                <option value="{{ $dsn2->id }}" @if($dsn2->id == $judul->dp_2)Selected @endif>{{ $dsn2->name}}</option> 
                            @endforeach
                        </select>
                        <br/>
                        <select name="st_judul" class="form-control">
                                @if($judul->st_judul == 0)
                                    <option value="0" Selected hidden>Status Judul</option>
                                @endif
                                @foreach ($st_judul as $stj)
                                    <option value="{{ $stj->id_st_judul }}" @if($stj->id_st_judul == $judul->st_judul)Selected @endif>{{ $stj->name_st_judul}}</option> 
                                @endforeach
                        </select>
                        <br/>
                    @endif   
                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }} 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection