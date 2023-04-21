<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


  <div class="row  justify-content-center">
<div class="col-sm-6 mt-4">
<div class="card p-4">
<form method="POST" action="/upload-image" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label>Image</label>
<input type="file" name="profile" class="form-control" />
</div>
<button type="submit" class="btn btn-info">Submit</button>

</form>

</div>
 
</div>

</body>
</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image',
            'content' => 'required',
            'user_id' => 'required'
        ]);
    
        // Store the post in the database
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = $validatedData['user_id'];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'storage/images/' . $filename;
            Storage::putFileAs('public/images', $image, $filename);
            $post->image = $path;
        }
    
        $post->save();
    
        // Redirect to the post creation form with a success message
        return redirect('posts/create')->with('success', 'Post created successfully!');
    }
    
    public function show()
    {
        $post = Post::all();
        return view('posts/display', ['posts' => $post]);
    }
}