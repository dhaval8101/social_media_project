
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

@include('layouts.footers.auth.footer')
<br>
<br><br>
<br>
<br><br><br><br>
<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
    <br>
    <br>


    <div class="container">

        <div class="row">
            @foreach ($posts as $post)


            <div class="col col-lg-3 border bg-light px-md-5">
                <img class="img-fluid my-4" style="height:300px;" src="{{ asset($post->image) }}" alt="">
                <button class="btn btn-danger mb-4 "><a type="button" class="link-light text-decoration-none" href={{'delete/'.$post['id']}}>Delete</a>
               
             <button class="btn btn-success mb-4 mx-3 "><a type="button" class="link-light text-decoration-none" href={{'posts/edit/'.$post['id']}}  >Edit</a>
            
            </div>

            @endforeach
        </div>

    </div>

</body>
</html>
@endsection
