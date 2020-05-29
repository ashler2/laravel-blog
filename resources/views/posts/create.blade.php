@extends('layouts.app')

@section('content')
  <h1>Create Post</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('POST')}}
    <div class="form-group">
      <label for="title">Post title</label>
      <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror form-control" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="body">Post body</label>
      <input type="textarea" id="body" name="body" class="@error('body') is-invalid @enderror form-control" placeholder="Body Text">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Form Submit</button>
    </div>
  </form>

@endsection