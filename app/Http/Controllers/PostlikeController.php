<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postlike;
class PostlikeController extends Controller
{

    public function store(Request $request)
{
    $validation = $request->validate([
        'post_id' => 'required|exists:posts,id',
        'user_id' => 'required|exists:users,id',
        'is_like' => 'required|boolean',
    ]);

    $postlike = new PostLike();
    $postlike->post_id = $request->post_id;
    $postlike->user_id = $request->user_id;
    $postlike->is_like = $request->is_like;
    $postlike->save();

    return response()->json(['message' => 'Post like saved successfully']);
}

}