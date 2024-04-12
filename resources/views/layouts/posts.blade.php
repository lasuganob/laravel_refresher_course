<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5 mb-3">
    <a class="btn btn-primary me-md-2" type="button" href="{{ route('posts.create') }}">Add Post</a>
</div>
<table class="table table-bordered table-stripped table-hover">
    <thead>
        <tr>
            <th scope="col w-10">#</th>
            <th scope="col w-70">Title</th>
            <th scope="col w-20">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach($posts as $post)
            @can('show', $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                <td>
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary mb-2">Edit</a>
                    @endcan

                    @can('delete', $post)
                        <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    @endcan
                </td>
            </tr>
            @endcan
        @endforeach
    </tbody>
</table>

{{ ($posts) ? $posts->links() : '' }}
