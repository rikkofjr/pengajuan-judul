{{-- \resources\views\permissions\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
              <!-- Card stats -->
                <div class="row">
                    <h1>All Post</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow card-shadow">
                    <div class="card-header bg-transparent">
                        <h1><i class="fa fa-key"></i> Add Permission</h1>
                    </div>
                    <div class="card-body">
                        {{ Form::open(array('url' => 'dashboard/permissions')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div><br>
                        @if(!$roles->isEmpty()) //If no roles exist yet
                            <h4>Assign Permission to Roles</h4>

                            @foreach ($roles as $role) 
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach
                        @endif
                        
                    </div>
                    <div class="card-footer">
                        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection