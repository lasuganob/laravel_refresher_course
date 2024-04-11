@extends('customer.index')

@section('content')
    <form action="{{ route('customer.update', $customer->id) }}" class="form-group" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $customer->user_id }}">
        </div>
        <button type="submit" class="btn mt-3 btn-primary">Update Customer</button>
    </form>
@endsection
