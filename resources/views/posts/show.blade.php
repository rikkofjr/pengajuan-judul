@extends('layouts.app')

@section('title', '| View Post')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em> </div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <h1 class="text-dark">{{ $post->title }}</h1>
                </div>
                <div class="card-body">
                    <p class="lead">{{ $post->isi }} </p>
                </div>
                <div class="card-footer">
                    <h5 class="text-dark">{{ $post->users->name }}</h5>
                </div>
            </div>
        </div>
    </div>

    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    
    @can('Delete Post')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}
    
    @hasrole('Admin')
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
    @endhasrole

</div>

@endsection