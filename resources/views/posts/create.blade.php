    @extends('layouts.app')

    @section('title', '| Create New Post')

    @section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <h1 class="text-white">Create New Post</h1>
                </div>
            </div>
        </div>
    </div>
    

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="container">
                        @if(Session::has('Article'))
                        <p class="alert alert-info">{{ Session::get('Article') }}</p>
                        @endif
                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('route' => 'posts.store')) }}

                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('isi', 'ini Isinya') }}
                            {{ Form::textarea('isi', null, array('class' => 'form-control')) }}
                            <br>
                            <select name="categorynya" class="form-control" data-toggle="select" title="Simple select" data-placeholder="Select a state">
                            @foreach ($categorynya as $categories)
                                <option value="{{ $categories->id }}">{{ $categories->category }}</option>
                            @endforeach
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

    @endsection