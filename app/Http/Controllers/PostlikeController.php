<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postlike;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostlikeController extends Controller
{
    public function store(Post $post) {
        $existingLike = Postlike::where('user_id', Auth::user()->id)
            ->where('post_id', $post->id)
            ->first();
    
        if ($existingLike && $existingLike->is_like) {
            $existingLike->update([
                'is_like' => false,
                'is_dislike' => true,
            ]);
        } elseif ($existingLike && !$existingLike->is_like) {
            $existingLike->update([
                'is_like' => true,
                'is_dislike' => false,
            ]);
        } else {
            Postlike::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'is_like' => false,
                'is_dislike' => true,
            ]);
        }
    
        // Update like and dislike count
        $likeCount = $post->likes->where('is_like', true)->count();
        $dislikeCount = $post->likes->where('is_dislike', true)->count();
    
        // Return like/dislike count in JSON format
    
        return redirect('/user-management')->with('success', 'Post created successfully!');
    }
    
    

    // return view('/pages/user-management', ['posts' => $post]);    
    public function show(Post $post)
    {

        $postlike = Postlike::where('post_id', $post->id)->first();

        return view('/pages/user-management', compact('post', 'postlike'));
    }



    public function showPostLikes($postId)
    {
        $post_likes = Postlike::where('post_id', $postId)->get();
        return view('postLikes', ['post_likes' => $post_likes]);
    }
}