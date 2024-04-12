<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Field;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $posts = $post->orderBy("created_at","desc")->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $form = $formBuilder->createByArray([
                [
                    'name'=> 'title',
                    'type' => Field::TEXT,
                ],
                [
                    'name'=> 'content',
                    'type' => Field::TEXTAREA,
                ],
                [
                    'name'=> 'status',
                    'type' => Field::CHECKBOX,
                    'label' => 'Check to show post'
                ],
                [
                    'name' => 'submit',
                    'type' => FIELD::BUTTON_SUBMIT,
                    'label' => 'Create Post',
                    'attr' => ['class' => 'btn btn-primary mt-3'],
                ]
            ]
            ,[
                'method' => 'POST',
                'url' => route('posts.store')
        ]);

        return view('posts.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id,
        ]);

        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
        ]);

        $post = Post::create($request->all());

        return redirect()->route('posts.index')->with('success_add', 'Post Successfully Added');
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
        $form = $form = $formBuilder->createByArray([
                [
                    'name'=> 'title',
                    'type' => Field::TEXT,
                    'value' => $post->title,
                ],
                [
                    'name'=> 'content',
                    'type' => Field::TEXTAREA,
                    'value' => $post->content,
                ],
                [
                    'name'=> 'status',
                    'type' => Field::CHECKBOX,
                    'label' => 'Check to show post',
                    'checked' => $post->status ? 'checked' : '',
                ],
                [
                    'name' => 'submit',
                    'type' => FIELD::BUTTON_SUBMIT,
                    'label' => 'Update Post',
                    'attr' => ['class' => 'btn btn-primary mt-3'],
                ]
            ]
            ,[
                'method' => 'PUT',
                'url' => route('posts.update',[$post]),
        ]);

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
            'status' => $request->status,
        ]);

        return redirect()->route('posts.index')->with('success_edit', 'Post Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')->with('success_delete', 'Post Successfully Deleted');
    }
}
