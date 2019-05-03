@extends('layouts.app')

@section('title')
  ini judul
@endsection

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
                    <
                </div>
                <div class="card-body">
                   
                </div>
                <div class="card-footer">
                    <
                </div>
            </div>
        </div>
    </div>

    <hr>
</div>

@endsection