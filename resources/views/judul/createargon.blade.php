    @extends('layouts.argon')

    @section('title', '| Create New Post')

    @section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            <h1>Create New Post</h1>
            <hr>

        {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'posts.store')) }}

            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}
                <br>

                {{ Form::label('isi', 'ini Isinya') }}
                {{ Form::textarea('isi', null, array('class' => 'form-control')) }}
                <br>
                <select name="categorynya">
                @foreach ($categorynya as $categories)
                    <option value="{{ $categories->id_cat }}">{{ $categories->category }}</option>
                @endforeach
                </select>
                {{ Form::hidden('usernya', Auth::user()->id, array('class' => 'form-control')) }}
                {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
                
                
            </div>
                
            </div>
        </div>
</div>

    @endsection