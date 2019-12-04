<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\Admin\Posts\StorePostRequest;
use App\Http\Requests\Admin\Posts\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('admin.posts.list', [
            'items' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.posts.create', [
            'action' => route('posts.store'),
            'method' => 'post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $data = $validated;

        Post::create($data);

        return redirect()
            ->route('posts.index')
            ->with('success', 'post created!');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', [
            'action' => route('posts.update', $id),
            'method' => 'put',
            'item' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validated();

        $post->update($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $item = Post::findOrFail($id);
        $item->delete();

        session()->flash('success', 'Post deleted!');
    }
}
