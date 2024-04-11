@extends('customer.index')

@section('content')
    <h2>List of customers</h2>

    @if(session('success_delete'))
        <div class="alert alert-danger">
            {{ session('success_delete') }}
        </div>
    @endif

    @if(session('success_edit'))
        <div class="alert alert-success">
            {{ session('success_edit') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>User Type</th>
                <th>Actions</th>
            </tr>
            @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td><a href="{{ route('customer.edit', $customer->id) }}">{{ $customer->name }}</a></td>
                    <td>{{ $customer->usertype }}</td>
                    <td>
                        <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
@endsection
