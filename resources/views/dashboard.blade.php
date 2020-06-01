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
                    <div class="">
                        @foreach ($posts as $post)
                    <h1>{{ $post->title}}</h1>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
