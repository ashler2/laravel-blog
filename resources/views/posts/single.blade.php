@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-default">Go Back</a>
  <h1>{{$post->title}}</h1>
  <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="" style="width:100%;">
  <br>
  <br>

  <div>
    {!! $post->body !!}
  </div>
  <hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
  <hr>
  @auth
    @if (Auth::user()->id == $post->user_id)
      <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
      <form action="{{ route('posts.destroy', $post->id) }}" class="" method="POST">
        @csrf
        {{method_field('Delete')}}
        <button class="btn btn-danger" type="submit">Destroy</button>
      </form>
    @endif
  @endauth
    
@endsection