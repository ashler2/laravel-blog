@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0 )
      @foreach ($posts as $post)
        <div class="well">
          <a href="/posts/{{$post->id}}" class="">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="" style="width:100%;">
              </div>
              <div class="col-md-8 col-sm-8">
                <h3>{{ $post->title }}</h3>
                <small>Written on {{ $post->created_at }} by user: {{ $post->user->name}}</small>
              </div>
            </div>
          </a>
        </div>
        @endforeach
        {{$posts->links()}}
    @else 
    <p>No Posts Found</p>
    @endif
@endsection