<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'   => 'required|max:255',
            'image'   => 'nullable|image',
            'content' => 'required',
        ]);
        $post = new Post([
            'title'   => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => $request->input('user_id', auth()->id()),
        ]);
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'storage/images/' . $filename;
            Storage::putFileAs('public/images', $request->file('image'), $filename);
            $post->image = $path;
        }
        $post->save();
        return redirect('posts/create')->with('success', 'Post created successfully!');
    }

    public function show()
    {
        $post = Post::all();
        return view('/pages/user-management', ['posts' => $post]);
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/user-management')->with('success', 'Post created successfully!');
    }
    public function edit(Post $post)
    {
        return view('posts.update', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'   => 'required|max:255',
            'image'   => 'nullable|image',
            'content' => 'required',
        ]);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = $request->input('user_id', auth()->id());

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'storage/images/' . $filename;
            Storage::putFileAs('public/images', $request->file('image'), $filename);
            $post->image = $path;
        }

        $post->save();

        return redirect('/user-management')->with('success', 'Post created successfully!');
    }
}