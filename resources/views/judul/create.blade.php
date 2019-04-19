    @extends('layouts.app')

    @section('title', '| Create New Post')

    @section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <h1 class="text-white">Buat Judul Penelitian</h1>
                </div>
            </div>
        </div>
    </div>
    

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow bg-secondary">
                    <div class="card-header bg-white border-0">
                        Judul user 
                        {{Auth::user()->name}}
                    </div>
                    <div class="card-body">
                        <div class="container">
                            @if(Session::has('Judul'))
                            <p class="alert alert-info">{{ Session::get('Judul') }}</p>
                            @endif
                            {{-- Using the Laravel HTML Form Collective to create our form --}}
                            {{ Form::open(array('route' => 'judul.store')) }}

                            <div class="form-group">
                                {{ Form::label('judul', 'Judul Penelitian', array('class' => 'form-control-label')) }}
                                {{ Form::text('judul', null, array('class' => 'form-control form-control-alternative')) }}
                                
                                @if ($errors->has('judul')) 
                                    <h4 class="text-danger" style="margin:0 auto;">
                                        {{ $errors->first('judul') }}
                                    </h4>                                        
                                @endif
                                <br>

                                {{ Form::label('latar_belakang', 'Latar Belakang', array('class' => 'form-control-label')) }}
                                {{ Form::textarea('latar_belakang', null, array('class' => 'form-control form-control-alternative')) }}
                                <br>
                                {{ $errors->first('latar_belakang') }}
                                <select name="jenis_penelitian" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                                    <option value="1">Pengembangan</option>
                                    <option value="2">Pemanfaatan</option>
                                    <option value="3">Analisis</option>
                                </select>
                               <br/> 
                               <br/> 
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