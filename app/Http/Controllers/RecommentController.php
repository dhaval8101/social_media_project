<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Postcomment;
use App\Models\Recomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommentController extends Controller
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
    public function store(Request $request, $id)
    {
        //dd($request, $data);
        $this->validate($request, [
            'recomment'  => 'required',
        ]);
        $postcomment = Postcomment::find($id);
        //dd($postcomment->post_id);
        $recomment = Recomment::create($request->only('recomment')
            + [
                'user_id'   => $postcomment->user_id,
                'postcomment_id' => $postcomment->id,
                'post_id'   => $postcomment->post_id
            ]);
            return redirect()->route('comment.view', $postcomment->post_id)->with('success', 'Post liked successfully!');

    }


    public function viewcomment($id)
    {
        $data = Postcomment::find($id);

        $data = compact('data');
        return view('edit')->with($data);
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
    public function destroy( $id)
    {
      $recomment = Recomment::findOrFail($id);
      $recomment->delete();
      return redirect()->route('comment.view', $recomment->post_id)->with('success', 'Post liked successfully!');
    }
}