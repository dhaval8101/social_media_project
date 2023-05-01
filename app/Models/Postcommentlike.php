<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcommentlike extends Model
{
    use HasFactory;
    protected $table = 'post_comment_likes';
    protected $fillable=[
 
    'user_id',
    'post_id',
    'postcomment_id',
    'is_like',
    'is_dislike'

        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postcomment()
    {
        return $this->belongsTo(Postcomment::class);
    }

    public function post()
    {
        return $this->comment->post();
    }
}