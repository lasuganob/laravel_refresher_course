@extends('posts.layout')

@section('content')
    <div class="row gx-5 mt-5">
        <div class="col-md-12 mb-4">
            <h4 class="mb-2"><strong>{{ $post->title }}</strong></h4>
            <span class="badge text-bg-secondary mb-4">{{ $post->user->name }}</span>
            <small>{{ $posted_at }}</small>

            <p class="text-muted">
                {{ $post->content }}
            </p>
        </div>
    </div>

    @can('update', $post)
        <a href="{{ route(role_prefix() . '.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
    @endcan
    @can('delete', $post)
        <a href="{{ route(role_prefix() . '.posts.destroy', $post->id) }}" class="btn btn-sm btn-danger">Delete</a>
    @endcan
@endsection
