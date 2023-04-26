<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>
    <br>
    <br>


    <div class="container">

        <div class="row">
            @foreach ($posts as $post)

            <div class="col col-lg-4 border bg-light px-md-5"><img src="{{ asset($post->image) }}" alt="" style="width:100%;margin-top:15%;margin-bottom:10%;height:80%"></div>
            @endforeach
        </div>

    </div>
    <div class="feed-icon px-2"> <button class="btn btn-danger"><a class="text-white" type="button" href={{'delete/'.$post['id']}}>Delete</a>
            <button class="btn btn-info"><a class="text-white" type="button" href={{'posts/edit/'.$post['id']}}>edit</a></button></i></div>
    </div>
</body>
</html>
