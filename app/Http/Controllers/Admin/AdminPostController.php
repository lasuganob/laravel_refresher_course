<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\PostController;
use App\Models\Post;

use App\Traits\PostTrait;

use App\DataTables\PostsDataTable;

class AdminPostController extends PostController
{
    use PostTrait;
    /**
     * Display a listing of the resource.
     */
    // public function index(Post $post)
    // {
    //     $posts = $post->orderBy("created_at","desc")->paginate(10);
    //     return view('posts.index', compact('posts'));
    // }

    /**
     * Insert datatable on index - trial stage
     * @param \App\DataTables\PostsDataTable $dataTable
     * @return mixed
     */
    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('posts.index');
    }
}
