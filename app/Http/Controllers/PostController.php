<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{ 
    
    //create post 
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title'   => 'required|max:255',
            'image'   => 'nullable|image',
            'content' => 'required',
        ]);
        $post = new Post();
            $post->title=$request->title;
            $post->content=$request->content;
            $post->user_id = auth()->id();
      
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'storage/images/' . $filename;
            Storage::putFileAs('public/images', $request->file('image'), $filename);
            $post->image = $path;
        }
        $post->save();
        $post = Post::orderBy('id', 'desc')->get();
        return redirect('/user-management')->with('success', 'Post created successfully!');
    }
 //display post 
 public function show()
 {
     $post = Post::orderBy('created_at', 'desc')->get();
     return view('/pages/user-management', ['posts' => $post]);
 }
 
 public function userPost()
 {
     $userId = auth()->id();
     $post = Post::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
     return view('pages/userpost', ['posts' => $post]);
 }
 
    public function edit(Post $post)    
    {
        return view('posts.update', compact('post'));
    }
    //update post
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
    //delete post
        $post->save();

        return redirect('/user-management')->with('success', 'Post update successfully!');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/user-management')->with('success', 'Post delete successfully!');
    }
}