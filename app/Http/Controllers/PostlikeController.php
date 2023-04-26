<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postlike;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostlikeController extends Controller
{
    public function like(Post $post)
    {
        $like = Postlike::where('user_id', Auth::user()->id)
            ->where('post_id', $post->id)
            ->first();

        if ($like && $like->is_like) {
            $like->update([
                'is_like' => 0,
            ]);
        } elseif ($like && !$like->is_like) {
            $like->update([
                'is_like' => 1,
                'is_dislike' => 0,
            ]);
        } else {
            Postlike::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'is_like' => 1,
                'is_dislike' => 0,
            ]);
        }
        // Update like and dislike count
        $likeCount = $post->likes->where('is_like', 1)->count();
        // Return like/dislike count in JSON format

        return redirect('/user-management')->with('success', 'Post liked successfully!');
    }
    public function dislike(Post $post)
    {
        $dislike = Postlike::where('user_id', Auth::user()->id)
            ->where('post_id', $post->id)
            ->first();

        if ($dislike && $dislike->is_dislike) {
            $dislike->update([
                'is_dislike' => 0,
            ]);
        } elseif ($dislike && !$dislike->is_dislike) {
            $dislike->update([
                'is_dislike' => 1,
                'is_like' => 0,
            ]);
        } else {
            Postlike::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post->id,
                'is_dislike' => 1,
                'is_like' => 0,
            ]);
        }

        // Update like and dislike count
        $dislikeCount = $post->likes->where('is_dislike', 1)->count();

        // Return like/dislike count in JSON format
        return redirect('/user-management')->with('success', 'Post disliked successfully!');
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