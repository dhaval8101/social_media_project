<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fvtFVlJOyHtFZV7+939KxJ+xV7vlAxnG6GvNUX9p+6/1Lv6Y/0M2ZhqzpeOduOOCNc5jFYNlOfvZ9XmrSjK2dg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<form method="POST" action="{{ route('postlike.store') }}">
    @csrf


    <div>
        <input type="radio" name="is_like" value="1" checked>
        <label for="is_like"><i class="fas fa-thumbs-up"></i> Like</label>
    </div>
    <div>
        <input type="radio" name="is_like" value="0">
        <label for="is_like"><i class="fas fa-thumbs-down"></i> Dislike</label>
    </div>

    <button type="submit">Submit</button>
</form>
