@extends('posts.layout')

@section('content')
    @include('layouts.message')

    @include('layouts.posts')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
