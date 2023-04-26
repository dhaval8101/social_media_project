<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Postcomment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request, Post $post)
    {

        $postcomment = new Postcomment();
        $postcomment->post_id = $post->id;
        $postcomment->user_id = auth()->id();
        $postcomment->comment = $request->comment;
        $postcomment->save();
        return redirect('/user-management')->with('success', 'Post comment successfully!');
        //return view('comment');
    }


    public function comment(Post $post)
    {
        $postcomment = Postcomment::where('post_id', $post->id)
            ->orderByDesc('created_at')
            ->get();

        return view('/comment', compact('post', 'postcomment'));
    }



    /**
     * Display the specified resource.
     */


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
    public function destroy(Postcomment $postcomment)
    {
        $postcomment->delete();
        return redirect()->back()->with('success', 'Post comment deleted successfully');
    }
    
}