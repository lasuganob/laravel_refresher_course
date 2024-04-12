@extends('posts.layout')

@section('content')
    <div class="row gx-5">
        <div class="col-md-12 mb-4">
        <span class="badge bg-info px-2 py-1 shadow-1-strong mb-3">{{ $post->user->name }}</span>
        <span>{{ $posted_at }}</span>
        <h4><strong>{{ $post->title }}</strong></h4>
        <p class="text-muted">
            {{ $post->content }}
        </p>
        </div>
    </div>
@endsection
