@extends('posts.layout')

@section('content')
    <div class="row gx-5 mt-5">
        <div class="col-md-6 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
              <img src="{{ $post->featured_image }}" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>
        <div class="col-md-6 mb-4">
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
