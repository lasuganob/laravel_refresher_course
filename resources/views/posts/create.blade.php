@extends('posts.layout')

@section('content')
    <div class="card mt-5">
        <h3 class="card-header">Add Post</h3>
        <div class="card-body">
            @livewire('create-post')
        </div>
    </div>
@endsection
