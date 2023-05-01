<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Recomment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'recomments';
    protected $fillable = [

        'recomment',
        'user_id',
        'post_id',
        'postcomment_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function postcomment()
    {
        return $this->belongsTo(PostComment::class);
    }
}