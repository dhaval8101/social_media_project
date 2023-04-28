<?php

namespace App\Http\Controllers;

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
    public function storec(Request $request,Postcomment $postcomment)
    {
        dd($postcomment);
         $like = Postcomment::where('user_id', Auth::user()->id)
            ->where('postcomment_id', $postcomment->id)
            ->first();
        $recomment = new Recomment();

        $postcomment->postcomment_id = $postcomment->id;
        $recomment->recomment = $request->recomment;
        $recomment->post_id = $request->post_id;
        $recomment->save();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
 
     
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