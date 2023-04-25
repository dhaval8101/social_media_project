<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Notifications\ForgotPassword;

class ResetPassword extends Controller
{
    use Notifiable;

    public function show()
    {
        return view('auth.reset-password');
    }

    public function routeNotificationForMail() {
        return request()->email;
    }

    public function send(Request $request)
    {
        $email = $request->validate([
            'email' => ['required']
        ]);
        $user = User::where('email', $email)->first();

        if ($user) {
            $this->notify(new ForgotPassword($user->id));
            return back()->with('succes', 'An email was send to your email address');
        }
    }
}
public function store(Request $request, Post $post)
{
    $is_like = $request->input('is_like', true);

    if ($is_like !== null) {
        $like = Postlike::where('user_id', $post->user_id)->where('post_id', $post->id)->first();

        if ($like) {
            if ($like->is_like == $is_like) {
                $like->save();
            } else {
                $like->is_like = $is_like;
                $like->save();
            }
        } else {
            $new_like = Postlike::create([
                'post_id' => $post->id,
                'user_id' => $post->user_id,
                'is_like' => $is_like
            ]);
        }

        // Check if the user has disliked the post before and is now liking it
        $dislike = Postlike::where('user_id', $post->user_id)->where('post_id', $post->id)->where('is_like', 0)->first();
        if ($dislike && $is_like == 0) {
            $dislike=false;
    } else {
        // handle the case where is_like is null (e.g. display an error message to the user)
    }    
    return redirect('/user-management')->with('success', 'Postlike created successfully!');
    // $post_likes = new Postlike();
    // $post_likes->post_id = $post->post_id;
    // $post_likes->user_id = $post->user_id;
    // $post_likes->is_like = true;
    // $post_likes->save();

    //return response()->json(['message' => 'Post like saved successfully']);
}
}
///

public function store(Request $request, Post $post)
{
    $is_like = $request->input('is_like', false);

    if ($is_like !== null) {
        $existing_like = Postlike::where('user_id', $post->user_id)->where('post_id', $post->id)->first();

        if ($existing_like) {
            if ($existing_like->is_like == $is_like) {
                // The user has clicked the same button again, so update the is_like field to 0
                $existing_like->is_like = 0;
            } else {
                // The user has clicked the other button, so update the is_like field to 1
                $existing_like->is_like = 1;
            }
            $existing_like->save();
        } else {
            $new_like = Postlike::create([
                'post_id' => $post->id,
                'user_id' => $post->user_id,
                'is_like' => 1 // Set the like status to 1 since this is the first time the user has clicked the button
            ]);
        }
    } else {
        // handle the case where is_like is null (e.g. display an error message to the user)
    }
    ////

    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

@include('layouts.footers.auth.footer')
<html>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
    function dislike(x) {
        x.classList.toggle('fa-thumbs-down')
    }

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        background-color: #eee
    }

    .time {
        font-size: 9px !important
    }

    .socials i {
        margin-right: 14px;
        font-size: 17px;
        color: #d2c8c8;
        cursor: pointer
    }

    .feed-image img {
        width: 100%;
        height: auto
    }

    .btn {
        background: transparent;
        border: none;

        outline: none;
    }

    .fa-thumbs {
        color: blue;
    }

.like-button {
    background-color: #ccc;
    color: #fff;
    border: none;
    padding: 10px 20px;
}

.like-button:hover {
    background-color: #555;
}

</style>
<br>
<br>
<br>
<br>
<br>
<br>
<body>

    @foreach ($posts as $post)
    @if ($post->image)
    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="feed p-2">
                    {{-- <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white border">
           
                    <div class="feed-icon px-2"><i class="fa fa-long-arrow-up text-black-50"></i></div> --}}
                </div>
                <div class="bg-white border mt-2">
                    <div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle" src="{{ asset($post->image) }}" width="20">
                                <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">{{ $post->user->name }}</span><span class="text-black-50 time"></span></div>
                            </div>
                            <div class="feed-icon px-2">
                                {{-- <button class="btn btn-danger"><a class="text-white" type="button" href={{'delete/'.$post['id']}}>Delete</a>
                                <button class="btn btn-info"><a class="text-white" type="button" href={{'posts/edit/'.$post['id']}}>edit</a></button> --}}

                                </i></div>
                        </div>
                    </div>
                    {{-- <div class="p-2 px-3"><span>{{ $post->content }}</span>
                </div> --}}
                {{-- <div class="d-flex justify-content-end socials p-2 py-3"><i class="fa fa-thumbs-up"></i><i class="fa fa-comments-o"></i><i class="fa fa-share"></i></div>
                    </div> --}}
                <div class="bg-white border mt-2">
                    <div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2">
                                <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">{{ $post->title }}</span><span class="text-black-50 time"></span></div>

                            </div>
                            {{--
                            <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div> --}}
                        </div>
                    </div>
                    <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="{{ asset($post->image) }}">
                    </div>
                    <p><strong>Like:</strong> <span class="like-count">{{ $post->likes->where('is_like', true)->count() }}</span></p>
                    <p><strong>Dislike:</strong> <span class="dislike-count">{{ $post->likes->where('is_dislike', true)->count() }}</span></p>

                    {{-- <a onclick="Toggle1(this)" class="btn" href="{{ url('like/'.$post->id) }}">
                        <i class="fa fa-thumbs-o-up thumbs-icon {{ isset($postlike) && $postlike->is_like ? 'fa-thumbs' : '' }}" aria-hidden="true"></i>
                    </a>
                    <a onclick="Toggle1(this)" class="btn" href="{{ url('like/'.$post->id) }}">
                        <i class="fa fa-thumbs-o-down thumbs-icon {{ isset($postlike) && $postlike->is_dislike ? 'fa-thumbs' : '' }}" aria-hidden="true"></i>
                    </a> --}}

                    <!-- Like button -->
<a class="like-button" href="{{ url('like/'.$post->id) }}" data-post-id="{{ $post->id }}" data-like="{{ $post->likedBy(Auth::user()) ? 'true' : 'false' }}" data-dislike="{{ $post->dislikedBy(Auth::user()) ? 'true' : 'false' }}" onclick="event.preventDefault();">
    <i class="fa {{ $post->likedBy(Auth::user()) ? 'fa-thumbs-up' : 'fa-thumbs-o-up' }} like-icon"></i>
    <span class="like-count">{{ $post->likesCount() }}</span>
</a>


<!-- Dislike button -->
{{-- <a class="dislike-button" href="{{ url('like/'.$post->id) }}" data-post-id="{{ $post->id }}" data-like="{{ $post->likedBy(Auth::user()) ? 'true' : 'false' }}" data-dislike="{{ $post->dislikedBy(Auth::user()) ? 'true' : 'false' }}" onclick="event.preventDefault();">
    <i class="fa {{ $post->dislikedBy(Auth::user()) ? 'fa-thumbs-down' : 'fa-thumbs-o-down' }} dislike-icon"></i>
    <span class="dislike-count">{{ $post->dislikesCount() }}</span>
</a> --}}



                    <div class="d-flex justify-content-end socials p-21 py-31"><i class="fa fa-comments-o"></i></div>
                    <div class="p-2 px-3"><span>{{ $post->content }}</span></div>

                </div>
            </div>
        </div>
    </div>
    </div>
    @endif
    @endforeach
    <script>
   
 document.addEventListener('DOMContentLoaded', function() {
    const likeButtons = document.querySelectorAll('.like-button, .dislike-button');
    likeButtons.forEach(likeButton => {
        likeButton.addEventListener('click', function() {
            const postID = this.dataset.postId;
            let isLike = this.dataset.like === 'true';
            let isDislike = this.dataset.dislike === 'true';

            if (this.classList.contains('like-button')) {
                isLike = !isLike;
            } else {
                isDislike = !isDislike;
            }

            fetch(`/like/${postID}`, {
                method: 'POST',
                body: JSON.stringify({ is_like: isLike, is_dislike: isDislike }),
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

                const dislikeCountElement = this.querySelector('.dislike-count');
                if (dislikeCountElement) {
                    dislikeCountElement.innerText = data.dislikeCount;
                }

                const likeIconElement = this.querySelector('.like-icon');
                if (likeIconElement) {
                    if (data.isLiked) {
                        likeIconElement.classList.remove('fa-thumbs-o-up');
                        likeIconElement.classList.add('fa-thumbs-up');
                    } else {
                        likeIconElement.classList.remove('fa-thumbs-up');
                        likeIconElement.classList.add('fa-thumbs-o-up');
                    }
                }

                const dislikeIconElement = this.querySelector('.dislike-icon');
                if (dislikeIconElement) {
                    if (data.isDisliked) {
                        dislikeIconElement.classList.remove('fa-thumbs-o-down');
                        dislikeIconElement.classList.add('fa-thumbs-down');
                    } else {
                        dislikeIconElement.classList.remove('fa-thumbs-down');
                        dislikeIconElement.classList.add('fa-thumbs-o-down');
                    }
                }
            }).catch(error => {
                console.error(error);
            });
        });
    });
});



</script>


</body>
</div>
@endsection