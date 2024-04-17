<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\PostController;
use App\Models\Post;

use App\Traits\PostTrait;

use Yajra\DataTables\DataTables;

class AdminPostController extends PostController
{
    use PostTrait;

    public function index()
    {
        return view('posts.index')->with('posts_url', route("admin.posts.data"));
    }

    /**
     * Query posts records for Admin
     */
    public function getPosts(DataTables $dataTables, Post $post)
    {
        $posts = $post->orderBy("created_at", "desc")->with('user');

        return $dataTables->eloquent($posts)
            ->addColumn('action', function (Post $post) {
                return view('layouts.datatables.actions', compact('post'));
            })
            ->rawColumns((['action']))
            ->make(true);
    }
}
