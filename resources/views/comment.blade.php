<html>
<head>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ZNDeGds1Ntwpgx5W5y+j+5PjJ/A/2QrP3WZL2Qm1M6U7z6RKpG6y9EL6gLvggCfKz43JW8Ebsav34AlYcKrx+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  --}}
<script>
    function dislike(x) {
        x.classList.toggle('fa-thumbs-down')
    }

</script>


    <style>
        body {
            margin-top: 20px;
            background: #ebeef0;
        }

        .img-sm {
            width: 46px;
            height: 46px;
        }

        .panel {
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
            border-radius: 0;
            border: 0;
            margin-bottom: 15px;
        }

        .panel .panel-footer,
        .panel>:last-child {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .panel .panel-heading,
        .panel>:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .panel-body {
            padding: 25px 20px;
        }


        .media-block .media-left {
            display: block;
            float: left
        }

        .media-block .media-right {
            float: right
        }

        .media-block .media-body {
            display: block;
            overflow: hidden;
            width: auto
        }

        .middle .media-left,
        .middle .media-right,
        .middle .media-body {
            vertical-align: middle
        }

        .thumbnail {
            border-radius: 0;
            border-color: #e9e9e9
        }

        .tag.tag-sm,
        .btn-group-sm>.tag {
            padding: 5px 10px;
        }

        .tag:not(.label) {
            background-color: #fff;
            padding: 6px 12px;
            border-radius: 2px;
            border: 1px solid #cdd6e1;
            font-size: 12px;
            line-height: 1.42857;
            vertical-align: middle;
            -webkit-transition: all .15s;
            transition: all .15s;
        }

        .text-muted,
        a.text-muted:hover,
        a.text-muted:focus {
            color: #acacac;
        }

        .text-sm {
            font-size: 0.9em;
        }

        .text-5x,
        .text-4x,
        .text-5x,
        .text-2x,
        .text-lg,
        .text-sm,
        .text-xs {
            line-height: 1.25;
        }

        .btn-trans {
            background-color: transparent;
            border-color: transparent;
            color: #929292;
        }

        .btn-icon {
            padding-left: 9px;
            padding-right: 9px;
        }

        .btn-sm,
        .btn-group-sm>.btn,
        .btn-icon.btn-sm {
            padding: 5px 10px !important;
        }

        .mar-top {
            margin-top: 15px;
        }

      .like-icon,
    .dislike-icon {
        margin-right: 1px;
    }

    .like-count,
    .dislike-count {
        margin-left: 1px;
        font-weight: bold;
    }
.like-icon.active {
    color: blue;
}
.dislike-icon.active {
    color: red;
}
.like-icon, .dislike-icon {
    color: grey;
}
.like-icon.active {
    color: blue;
}

.dislike-icon.active {
    color: red;
}
.like-icon.active {
    color: blue;
}

.dislike-icon.active {
    color: red;
}

    </style>


    <form action="{{ route('comment.store', $post) }}" method="post">
        @csrf
        <div class="container bootdey">
            <div class="col-md-12 bootstrap snippets">
                <div class="panel">
                    <div class="panel-body">
                        <textarea class="form-control" name="comment" rows="2" placeholder="Add Comment......"></textarea>

                        <div class="mar-top clearfix">
                            <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-paper-plane" style="color:pink;font-size:22px;" aria-hidden="true"></i></button>
                            
                        </div>
                    </div>
                </div>
    </form>

    @if($postcomment->count() > 0)
    @foreach($postcomment as $comment)
    {{-- @foreach($data as $datas ) --}}
    <div class="panel">
        <div class="panel-body">
            <!-- Newsfeed Content -->
            <!--===================================================-->
            <div class="media-block">
                
                <div class="media-body">
                    <div class="mar-btm">
                    </div>
                    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">{{ $comment->comment }}</th>
 {{-- {{ $post->user->name }} --}}
    </tr>
  </thead>
  </table>
                   {{-- <h4>{{ $comment->comment }}</h4> --}}
                   @if (auth()->check() && auth()->user()->id === $comment->user_id)   
  @foreach ($comment->recomment as $recomment)
<div class="table-users">
   <div class="header"></div>
   
   <table>
      <tr>
  
         <th>recomments</th>
         <th>delete</th>
 
      </tr>
      
            <tr>
      
         <td>  {{ $recomment->recomment }} </td>
         
         <td> <a href={{url('recomment/'.$recomment->id) }}  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></td>

      </tr>
     </table>
</div>

  @endforeach
                    @endif

                   
                    <div class="pad-ver">
                        <div class="btn-group">
                                @if (auth()->check() && auth()->user()->id === $comment->user_id)
                             
                     <a  href={{url('postcomment/'.$comment->id) }}  class="delete" title="Delete" style="padding:10px;margin-top:10px;" data-toggle="tooltip"><i class="fa fa-trash-o" style="font-size:30px;color:red"></i></a>
                    {{-- <button class="btn btn-dark mb-4 "><a type="submit" style="color:white" class="link-light text-decoration-none" href={{url('postcomment/'.$comment->id) }}>Delete</a></button> --}}
                                      @endif
                            




       <a class="like-button" href="{{ url('is-like/'. $post->id.'/' .$comment->id) }}">
                        <button type="button" class="btn btn-link">
                       <i class="fa fa-thumbs-up like-icon{{ $post->likes->where('user_id', Auth::id())->where('like', true)->count() > 0 ? ' active' : '' }}" style="font-size:30px"></i>
                        <span class="like-count">{{ $comment->postcommentlike ? $comment->postcommentlike->where('like', true)->count() : 0 }}</span>
                        </button>
                    </a>
  <a class="dislike-button" href="{{ url('dis-like/'. $post->id.'/' .$comment->id) }}">
                    <button type="button" class="btn btn-link">
                    <i class="fa fa-thumbs-down dislike-icon{{ $post->likes->where('user_id', Auth::id())->where('dislike', true)->count() > 0 ? ' active' : '' }}" style="font-size:30px"></i>
                    <span class="dislike-count">{{ $comment->postcommentlike ? $comment->postcommentlike->where('dislike', true)->count() : 0 }}</span>
                    </button>
                </a>
                        </div>
                        <a class="btn btn-sm btn-default btn-hover-primary" href="{{ route('comments', ['id' => $comment->id]) }}"><i style="font-size:24px" class="fa">&#xf0e6;</i></a>


     
                    </div>
                    <hr>
  
                    {{-- <button class="btn btn-dark mb-4 "><a type="submit" style="color:white" class="link-light text-decoration-none" href={{url('postcomment/'.$comment->id) }}>Delete</a></button> --}}
  
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}

                    <!-- Modal -->


                    <!-- Comments -->


                </div>
            </div>
        </div>
        <!--===================================================-->
        <!-- End Newsfeed Content -->


        <!-- Newsfeed Content -->
        <!--===================================================-->

        <!--===================================================-->
        <!-- End Newsfeed Content -->

                @endforeach
        {{-- @endforeach --}}
        @else
        <p>No comments yet.</p>
        @endif
    </div>
    </div>
    </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const likeButtons = document.querySelectorAll('.like-button');
        likeButtons.forEach(likeButton => {
            likeButton.addEventListener('click', function() {
                const postID = this.dataset.postId;
                const commentID = this.dataset.commentId;
                const isLike = this.dataset.like === 'true';
                const isDislike = this.dataset.dislike === 'true';

                fetch(`/is-like/${post_id}/${comment_id}`, {
                    method: 'POST',
                    body: JSON.stringify({
                        like: isLike,
                        dislike: isDislike
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Failed to update like count');
                    }
                }).then(data => {
                    const likeCountElement = this.querySelector('.like-count');
                    if (likeCountElement) {
                        likeCountElement.innerText = data.likeCount;
                    }
const likeIconElement = this.querySelector('.like-icon');
if (likeIconElement) {
    if (data.isLiked) {
        likeIconElement.classList.remove('fa-thumbs-o-up');
        likeIconElement.classList.add('fa-thumbs-up');
        likeIconElement.classList.add('active');
    } else {
        likeIconElement.classList.remove('fa-thumbs-up');
        likeIconElement.classList.add('fa-thumbs-o-up');
        likeIconElement.classList.remove('active');
    }
}

const dislikeIconElement = this.querySelector('.dislike-icon');
if (dislikeIconElement) {
    if (data.isDisliked) {
        dislikeIconElement.classList.remove('fa-thumbs-o-down');
        dislikeIconElement.classList.add('fa-thumbs-down');
        dislikeIconElement.classList.add('active');
    } else {
        dislikeIconElement.classList.remove('fa-thumbs-down');
        dislikeIconElement.classList.add('fa-thumbs-o-down');
        dislikeIconElement.classList.remove('active');
    }
}
                    }).catch(error => {
                        console.error(error);
                    });
                });
            });
        });

    </script>




<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
var actions = $("table td:last-child").html();
// Append table with add row form on add new button click
$(".add-new").click(function(){
$(this).attr("disabled", "disabled");
var index = $("table tbody tr:last-child").index();

'<td>' + actions + '</td>' +
'</tr>';
$("table").append(row);
$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
$('[data-toggle="tooltip"]').tooltip();
});

// Delete row on delete button click
$(document).on("click", ".delete", function(){
$(this).parents("tr").remove();
$(".add-new").removeAttr("disabled");
});
});
</script>
<style>


body {
   background-color: lighten($baseColor, 30%);
   * { box-sizing: border-box; }
}

.header {
   background-color: darken($baseColor, 5%);
   color: white;
   font-size: 1.5em;
   padding: 1rem;
   text-align: center;
   text-transform: uppercase;
}



.table-users {
   border: 1px solid darken($baseColor, 5%);
   border-radius: $borderRadius;
   box-shadow: 3px 3px 0 rgba(0,0,0,0.1);
   max-width: calc(100% - 2em);
   margin: 1em auto;
   overflow: hidden;
   width: 800px;
}

table {
   width: 100%;
   
   td, th { 
      color: darken($baseColor, 10%);
      padding: $padding; 
   }
   
   td {
      text-align: center;
      vertical-align: middle;
      
      &:last-child {
         font-size: 0.95em;
         line-height: 1.4;
         text-align: left;
      }
   }
   
   th { 
      background-color: lighten($baseColor, 50%);
      font-weight: 300;
   }
   
   tr {     
      &:nth-child(2n) { background-color: white; }
      &:nth-child(2n+1) { background-color: lighten($baseColor, 55%) }
   }
}

@media screen and (max-width: 700px) {   
   table, tr, td { display: block; }
   
   td {
      &:first-child {
         position: absolute;
         top: 50%;
         transform: translateY(-50%);
         width: $imageBig;
      }

      &:not(:first-child) {
         clear: both;
         margin-left: $imageBig;
         padding: 4px 20px 4px 90px;
         position: relative;
         text-align: left;

         &:before {
            color: lighten($baseColor, 30%);
            content: '';
            display: block;
            left: 0;
            position: absolute;
         }
      }

      &:nth-child(2):before { content: 'Name:'; }
      &:nth-child(3):before { content: 'Email:'; }
    
   }

}




</style>
