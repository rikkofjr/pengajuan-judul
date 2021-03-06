@extends('layouts.app')

@section('title', '| Edit Post')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <h1 class="text-white">Edit Post</h1>
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
                    
                    @elseif( $post->usernya == auth::user()->id || auth::user()->hasRole('Admin'))
                        {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
                        <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

                        {{ Form::label('body', 'Post Body') }}
                        {{ Form::textarea('isi', null, array('class' => 'form-control')) }}<br>

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