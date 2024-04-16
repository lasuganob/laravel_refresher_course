<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Carbon\Carbon;

use App\Traits\PostTrait;

class PostController extends Controller
{
    use PostTrait;

    // Resources
    /**
     * Show the form for creating a new resource.
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $this->createPostForm($formBuilder);
        return view('posts.create', compact('form'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Post::create([
            'user_id'=> auth()->user()->id,
            'title' => $request->title,
            'content'=> $request->content,
            'status'=> $request->status ? $request->status : 0,
        ]);

        return redirect()->route(role_prefix() . '.posts.index')->with('success_add', 'Post Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'posted_at' => Carbon::parse($post->created_at)->diffForHumans(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, FormBuilder $formBuilder)
    {
        $form = $this->editPostForm($formBuilder, $post);
        return view('posts.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status ? $request->status : 0,
        ]);

        return redirect()->route(role_prefix() . '.posts.index')->with('success_edit', 'Post Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route(role_prefix() . '.posts.index')->with('success_delete', 'Post Successfully Deleted');
    }
}
