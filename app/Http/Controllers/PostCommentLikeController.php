<?php

namespace App\Http\Controllers;

use App\Models\Postcommentlike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Postcomment;

class PostCommentLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function isLike($post_id, $comment_id)
    {
        $comment = Postcomment::find($comment_id);
        if (!$comment) {
            abort(404);
        }
    
        $like = Postcommentlike::where('user_id', Auth::id())
            ->where('post_id', $post_id)
            ->where('postcomment_id', $comment_id)
            ->first();
    
        if (!$like) {
            // This is the first click, so create a new record with like set to 1
            $like = Postcommentlike::create([
                'user_id' => Auth::id(),
                'post_id' => $post_id,
                'like' => 1,
                'dislike' => 0,
                'postcomment_id' => $comment_id,
            ]);
        } elseif ($like->like) {
            // This is the second click, so update the existing record to set like to 0
            $like->update(['like' => 0, 'dislike' => 0]);
        } else {
            // This is an intermediate click, so update the existing record to set like to 1
            $like->update(['like' => 1, 'dislike' => 0]);
        }
    
        $likeCount = Postcommentlike::where('post_id', $post_id)
            ->where('postcomment_id', $comment_id)
            ->where('like', true)
            ->count();
    
        return response()->json(['like_count' => $likeCount, 'message' => 'Comment liked/disliked successfully!']);
    }
    
    // Update like and dislike count
    //$likeCount = $like->where('is_like', 1)->first();
    //$dislikeCount = $postcomment->likes->where('is_dislike', 1)->count();

    // Return like/dislike count in JSON format

    public function disLike( $post_id,  $comment_id)
    {
        $like = Postcommentlike::where('user_id', Auth::user()->id)
            ->where('post_id', $post_id)
            ->where('postcomment_id', $comment_id)
            ->first();
    
        if (!$like) {
            // This is the first click, so create a new record with dislike set to 1
            $like = Postcommentlike::create([
                'user_id' => Auth::user()->id,
                'post_id' => $post_id,
                'like' => 0,
                'dislike' => 1,
                'postcomment_id' => $comment_id,
            ]);
        } elseif ($like->dislike) {
            // This is the second click, so update the existing record to set dislike to 0
            $like->update(['dislike' => 0]);
        } else {
            // This is an intermediate click, so update the existing record to set dislike to 1
            $like->update(['dislike' => 1, 'like' => 0]);
        }
        
        $dislikeCount = Postcommentlike::where('post_id',  $post_id)
            ->where('postcomment_id', $comment_id)
            ->where('dislike', true)
            ->count();
    
        return response()->json(['dislike_count' => $dislikeCount, 'message' => 'Comment liked/disliked successfully!']);
    }
    
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}