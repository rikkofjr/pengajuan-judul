@extends('layouts.app')
    @section('title', '| All Post')
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
                    <div class="card-header bg-transparent"><h3>Posts | {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h3></div>
                    @foreach ($posts as $post)
                        <div class="card-body">
                            <li style="list-style-type:none;border-bottom:solid 1px #ccc;">
                                <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                    <p class="teaser">
                                       {{  str_limit($post->isi, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                    <br/>
                                </a>
                                <a href="postsby/{{ $post->usernya }}">{{ $post->users->name }}</a>
                            </li>
                            @if(Auth::guest())
                            
                            @elseif( $post->usernya == auth::user()->id || auth::user()->hasRole('Admin'))
                            <div style="margin-left:85%;">
                                <a href="/dashboard/posts/{{ $post->id}}/edit" class="btn btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id], 'onsubmit' => 'return confirmDelete()']) !!}
                                    {!! Form::submit('Delete', 
                                        ['class' => 'btn btn-sm btn-danger'], 
                                        ['id' => 'FormDeleteTime']
                                    ) !!}
                                {!! Form::close() !!}
                            </div>
                            @endif
                        </div>
                    @endforeach
                    </div>
                    <div class="card-footer py-4">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
     function confirmDelete() {
        return confirm('Are you sure you want to delete?');
     }
</script>
@endsection