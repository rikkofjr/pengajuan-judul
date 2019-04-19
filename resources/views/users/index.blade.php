{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Users')

@section('content')

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <h1 class="text-white"><i class="fa fa-users"></i> User Administration</h1>
                </div>
            </div>
        </div>
    </div>
    @hasanyrole('Admin')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                        <div class="card-header">
                            <div class="col-md-3 col-xs-push-8">
                                <a class="btn btn-sm btn-primary" href="{{ route('roles.index') }}">Roles</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('permissions.index') }}">Permissions</a>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>UserName</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date/Time Added</th>
                                            <th>User Roles</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                            <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm" style="margin-right: 3px;">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}            
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            
        <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>  
        @endhasanyrole

@endsection