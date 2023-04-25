<!DOCTYPE html>
<html>
<head>
<title>Post Likes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
i:hover{
    color:blue;
}
</style>
</head>
<body>
    <h1>Post Likes</h1>

        <div>
            @foreach ($postLikes as $like)
            <p>User {{ $like->user_id }} {{ $like->is_like ? 'liked' : 'disliked' }} this post</p>
        </div>
    @endforeach

    <script>
        function dislike(x){
            x.classList.toggle('fa-thumbs-down')
        }
    </script>
</body>
</html>
