@extends('layouts.app')

@section('title', '| Buat Jadwal Seminar Proposal')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <h1 class="text-white">Buat Jadwal Seminar Proposal</h1>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow bg-secondary">
                <div class="card-header bg-white border-0">
                    Jadwal Sempro 
                    {{Auth::user()->name}}
                </div>
                <div class="card-body">
                    <div class="container">
                        @if(Session::has('Jadwal Sempro'))
                        <p class="alert alert-info">{{ Session::get('Jadwal Sempro') }}</p>
                        @endif
                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('route' => 'jadwal.store')) }}

                        <div class="form-group">
                            {{ Form::label('judul_proposal', 'Judul Proposal', array('class' => 'form-control-label')) }}
                            {{ Form::text('judul_proposal', null, array('class' => 'form-control form-control-alternative')) }}
                            
                            @if ($errors->has('judul_proposal')) 
                                <h4 class="text-danger" style="margin:0 auto;">
                                    {{ $errors->first('judul_proposal') }}
                                </h4>                                        
                            @endif
                        </div>
                        <div class="form-group">

                            {{ Form::label('berita_proposal', 'Deskripsi Singkat', array('class' => 'form-control-label')) }}
                            {{ Form::textarea('berita_proposal', '-', array('class' => 'form-control form-control-alternative')) }}
                           
                            @if ($errors->has('berita_proposal')) 
                                <small class="text-danger">
                                    {{ $errors->first('berita_proposal') }}
                                </small>                                        
                            @endif
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('tgl_proposal1', 'Mulai Proposal', array('class' => 'form-control-label')) }}
                                    {{ Form::date('tgl_proposal1', null, array('class' => 'form-control form-control-alternative')) }}

                                    @if ($errors->has('tgl_proposal1')) 
                                    <small class="text-danger">
                                        {{ $errors->first('tgl_proposal1') }}
                                    </small> 
                                     @endif
                                </div>                                       
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('tgl_proposal2', 'Akhir Proposal', array('class' => 'form-control-label')) }}
                                    {{ Form::date('tgl_proposal2', null, array('class' => 'form-control form-control-alternative')) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('jam_proposal', 'Durasi Propsal', array('class' => 'form-control-label')) }}
                            {{ Form::number('jam_proposal', null, array(
                                'class' => 'form-control form-control-alternative',
                                'max' => '10',
                                'min' => '1'
                            )) }}
                            <small class="text-muted">Jumlah jam <b>Maksimal</b> dilakukannya sidang</small>
                           <br/> 
                        </div>
                        <div class="form-group">
                            {{ Form::label('ruang_proposal', 'Ruang Propsal', array('class' => 'form-control-label')) }}
                            {{ Form::number('ruang_proposal', null, array(
                                'class' => 'form-control form-control-alternative',
                                'max' => '10',
                                'min' => '1'
                            )) }}
                            <small class="text-muted">Jumlah ruangan yang akan digunakan untuk sidang</small>
                           <br/> 
                        </div>
                        <div class="form-group">
                            <label for="Koordinator" class="form-control-label">Koordinator</label>
                            <select name="koordinator_proposal" class="form-control">
                                @foreach ($dosen as $dsn2)
                                    <option value="{{ $dsn2->id }}">{{ $dsn2->name}}</option> 
                                @endforeach
                            </select>
                        </div>
                            
                            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script-dynamic')
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endpush