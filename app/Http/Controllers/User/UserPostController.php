<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\PostController;
use App\Models\Post;

use App\Traits\PostTrait;

class UserPostController extends PostController
{
    use PostTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $posts = $post->where('user_id', auth()->user()->id)
                ->orWhere('status', 1)
                ->orderBy("created_at", "desc")
                ->paginate(10);

        return view('posts.index', compact('posts'));
    }

}
