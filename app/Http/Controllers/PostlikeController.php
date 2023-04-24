<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postlike;
use App\Models\Post;
class PostlikeController extends Controller
{

        public function store(Request $request)
    {
        $validation = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'is_like' => 'required|boolean',
        ]);

        $post_likes = new PostLike();
        $post_likes->post_id = $request->post_id;
        $post_likes->user_id = $request->user_id;
        $post_likes->is_like = $request->is_like;
        $post_likes->save();

        return response()->json(['message' => 'Post like saved successfully']);
    }
  
    // return view('/pages/user-management', ['posts' => $post]);    
    public function show($id)
{
    $post = Post::findOrFail($id);
    $likes = $post->likes()->get();
    return view('pages.user-management', compact('post', 'likes'));
}

    }