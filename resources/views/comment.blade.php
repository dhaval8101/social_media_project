<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ZNDeGds1Ntwpgx5W5y+j+5PjJ/A/2QrP3WZL2Qm1M6U7z6RKpG6y9EL6gLvggCfKz43JW8Ebsav34AlYcKrx+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ZNDeGds1Ntwpgx5W5y+j+5PjJ/A/2QrP3WZL2Qm1M6U7z6RKpG6y9EL6gLvggCfKz43JW8Ebsav34AlYcKrx+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <form action="{{ route('comment.store', $post) }}" method="post">
        @csrf
   <div class="row d-flex justify-content-center">
  <div class="col-md-8 col-lg-6">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <div class="form-outline mb-4">
          <input type="text" id="addANote" class="form-control" name="comment" placeholder="Type comment..." />
          <br>  
          {{-- <label class="form-label" for="addANote">+ Add a note</label> --}}
          <button type="submit" class="btn btn-primary">post comment</button>
        </div>


</body>

</head>
</html>
<div style="height: 650px; overflow-y:scroll;width: fit-content;" class="container">
    @if($postcomment->count() > 0)
    @foreach($postcomment as $comment)
    <style>



        body {
            background-color: #fff;
        }

        .container {
            
            width: 400px;
        }

        .addtxt {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            font-size: 13px;
            width: 350px;
            background-color: #e5e8ed;
            font-weight: 500;
        }

        .form-control: focus {
            color: #000;
        }

        .second {
            width: 350px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 10px 10px 5px #aaaaaa;
        }

        .text1 {
            font-size: 13px;
            font-weight: 500;
            color: #56575b;
        }


$delete-red: red;

body {
  margin: 32px;
}

.btn1 {
  display: flex;
  align-items: center;
  background: none;
  border: 1px solid lighten(gray, 24%);
  height: px;
  padding: 0 24px 0 16px;
  letter-spacing: .25px;
  border-radius: 24px;
  cursor: pointer;
  
  &:focus {
    outline: none;
  }
  
  .mdi {
    margin-right: 8px;
  }
}

.btn-delete {
  font-size: 16px;
  color: red;
  
  >.mdi-delete-empty {
    display: none;
  }
  
  &:hover {
    background-color: lighten(red, 48%);
    
    >.mdi-delete-empty {
      display: block;
    }
    
    >.mdi-delete {
      display: none;
    }
  }
  

  
  &:focus {
    box-shadow: 0 0 0 4px lighten(red, 40%);
  }
}
.fa-heart-o {
  color: gray;
  font-size: 20px;
}

.fa-heart {
  color: red;
}




</style>



    <div class="container justify-content-center mt-5">

        <div class="d-flex justify-content-center py-2">
            <div class="second py-2 px-2" style="overflow-x: auto; border: 1px solid;"> <span class="text1">{{ $comment->comment }}</span>
                <div class="d-flex justify-content-between py-1 pt-2">
                </div>

<a class="like">
  <i class="fa fa-heart fa-heart-o"></i>
</a>




            </div>

        </div>
{{-- <button id="like-button">Like</button>
<i id="like-icon"  class="fa fa-heart-o"></i> --}}

<button class="btn1 btn-delete">
  <span class="mdi mdi-delete mdi-24px"></span>
  <span class="mdi mdi-delete-empty mdi-24px"></span>


<a href={{ route('postcomment.destroy', $comment->id) }} class="button condensed delete" style="color:red;">
Delete</a>

  </a>
  {{-- <span>Delete</span> --}}
</button>


    </div>
    @endforeach
    @else
    <p>No comments yet.</p>
    @endif
</div>


<script>
$(document).ready(function() {
  $(".like").click(function() {
    const heartIcon = $(this).find("i.fa-heart");
    if (heartIcon.hasClass("fa-heart-o")) {
      heartIcon.removeClass("fa-heart-o").addClass("fa-heart");
    } else {
      heartIcon.removeClass("fa-heart").addClass("fa-heart-o");
    }
  });
});



</script>



<script>
$(document).ready(function() {
  let likeCount = 0;
  let dislikeCount = 0;
  
  $(".like").click(function() {
    const heartIcon = $(this).find("i.fa-heart");
    if (heartIcon.hasClass("fa-heart-o")) {
      heartIcon.removeClass("fa-heart-o").addClass("fa-heart");
      likeCount++;
    } else {
      heartIcon.removeClass("fa-heart").addClass("fa-heart-o");
      likeCount--;
    }
    $(".like-count").text(likeCount);
  });
  
  $(".dislike").click(function() {
    dislikeCount++;
    $(".dislike-count").text(dislikeCount);
  });
});


</script>
