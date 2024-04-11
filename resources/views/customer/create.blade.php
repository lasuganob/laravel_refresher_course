@extends('customer.index')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {!! form($form) !!}
@endsection
