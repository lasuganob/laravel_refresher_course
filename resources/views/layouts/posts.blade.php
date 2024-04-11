<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5 mb-3">
    <button class="btn btn-primary me-md-2" type="button">Add Post</button>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>
                    <a href="#" class="btn btn-primary mb-2">Edit</a>
                    <a href="#" class="btn btn-danger">Danger</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}
