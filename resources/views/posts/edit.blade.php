@extends('posts.layout')

@section('content')
    <div class="card mt-5">
        <h3 class="card-header">Edit Post</h3>
        <div class="card-body">
            @livewire('edit-post', ['post' => $post])
        </div>
    </div>
@endsection
