@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('posts.create') }}" class="btn btn-primary"> Create Blog Post</a>
                    <h3>Your blog Posts</h3>
                    @if (count($posts) > 0 )
                        
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" class="" method="POST">
                                    @csrf
                                    {{method_field('Delete')}}
                                    <button class="btn btn-danger" type="submit">Destroy</button>
                              </form>
                            </td>

                        </tr>
                        @endforeach

                    </table>
                    @else 
                        <h4>
                            Create your first post to be shown here!
                        </h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
