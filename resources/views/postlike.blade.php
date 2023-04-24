<form method="POST" action="">
    @csrf
    
    <div class="form-group">
        <label for="is_like">Like:</label>
        <input type="checkbox" name="is_like" value="1" @if(old('is_like')) checked @endif />
        @error('is_like')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
