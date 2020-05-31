@extends('layouts.app')

@section('content')
  <h1>Edit Post</h1>
  

  <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('Patch')}}
    <div class="form-group">
      <label for="title">Post title</label>
    <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror form-control" placeholder="Title" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label for="article_body">Post body</label>
      <textarea type="textarea" id="article_body" name="article_body" class="@error('article_body') is-invalid @enderror form-control" placeholder="Body Text" >
        {!! $post->body !!}
      </textarea>
    </div>
    <div class="form-group">
      <button type="submit" id="blog-submit" class="btn btn-primary">Form Submit</button>
    </div>
 
  </form>


  @include('inc.scripts')
@endsection