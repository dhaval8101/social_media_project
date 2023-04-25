<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postlike extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'post_likes';
    protected $fillable = [
        'post_id',
        'user_id',
        'is_like',
        'is_dislike',
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}