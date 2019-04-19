@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Posts</h3></div>
                    <div class="panel-heading">Page {{ $judul->currentPage() }} of {{ $judul->lastPage() }}</div>
                    @foreach ($judul as $jdl)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ url('judul.show', $jdl->id ) }}"><b>{{ $jdl->judul }}</b><br>
                                    <p class="teaser">
                                       {{  str_limit($jdl->latar_belakang, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                    </div>
                    <div class="text-center">
                        {!! $judul->links() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection