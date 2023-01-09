<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Session\Store;

class PostController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',Post::class);
//        sleep(3);
        $posts = PostResource::collection(Post::all());
        return inertia('Posts/Index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create',Post::class);
        return inertia('Posts/Create');
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());
        return redirect()->route('posts.index')
            ->with('message', 'Post Add Successfully');
    }

    public function edit(Post $post)
    {
        $this->authorize('create',Post::class);
        return inertia('Posts/Edit', compact('post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('posts.index')
            ->with('message', 'Post Update Successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('message', 'Post Deleted Successfully');
    }

}
