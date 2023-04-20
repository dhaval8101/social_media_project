<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image',
            'content' => 'required',
            'user_id' => 'required'
        ]);
    
        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $request->hasFile('image') ? 'storage/' . str_replace('public/', '', $request->file('image')->storeAs('public/images', time() . '.' . $request->file('image')->getClientOriginalExtension())) : null,
            'user_id' => $validatedData['user_id']
        ]);
    
        return redirect('posts/create');
    }
    
}