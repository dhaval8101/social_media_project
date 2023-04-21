@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" required>{{ old('content') ?? $post->content }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
            @if ($post->image)
                <img src="{{ asset($post->image) }}" alt="Post Image" class="img-thumbnail">
            @else
                <small class="form-text text-muted">No image uploaded yet.</small>
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <script>
    
    $.ajax({
    url: '{{ route('posts.update', $post->id) }}',
    method: 'PUT',
    data: {
        // data to update the post
    },
    success: function(response) {
        // handle the response
    },
    error: function(error) {
        // handle the error
    }
});

    </script>
@endsection
