<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5 mb-3">
    <a class="btn btn-primary me-md-2" type="button" href="{{ route(role_prefix() . '.posts.create') }}">Add Post</a>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">Manage Posts</div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

{{-- <table class="table table-bordered table-stripped table-hover">
    <thead>
        <tr>
            <th scope="col w-10">#</th>
            <th scope="col w-70">Title</th>
            <th scope="col w-20">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    <a href="{{ route(role_prefix() . '.posts.show', $post->id) }}">{{ $post->title }}</a>
                    <br>
                    <span class="badge text-bg-secondary mb-4 mt-3">{{ $post->user->name }}</span>
                </td>
                <td>
                    @can('update', $post)
                        <a href="{{ route(role_prefix() . '.posts.edit', $post) }}" class="btn btn-sm btn-primary">Edit</a>
                    @endcan

                    @can('delete', $post)
                        <form method="POST" action="{{ route(role_prefix() . '.posts.destroy', $post) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table> --}}

{{-- {{ ($posts) ? $posts->links() : '' }} --}}
