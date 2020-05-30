@extends('layouts.app')

@section('content')
  <h1>Create Post</h1>
  

  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('POST')}}
    <div class="form-group">
      <label for="title">Post title</label>
      <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror form-control" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="article_body">Post body</label>
      <input type="textarea" id="article_body" name="article_body" class="@error('article_body') is-invalid @enderror form-control" placeholder="Body Text">
    </div>
    <div class="form-group">
      <button type="submit" id="blog-submit" class="btn btn-primary">Form Submit</button>
    </div>
 
  </form>


  @include('inc.scripts')
@endsection