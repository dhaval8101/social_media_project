<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use HasFactory, SoftDeletes;
  protected $fillable = [
    'title',
    'user_id',
    'image',
    'content'

  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }


  public function likes()
  {
    return $this->hasMany(Postlike::class);
  }
  public function likedBy(User $user)
  {
    return $this->likes->contains('user_id', $user->id);
  }
  public function dislikedBy(User $user)
{
    return $this->likes()->where('user_id', $user->id)->where('is_like', false)->exists();
}
public function likesCount()
{
    return $this->likes->where('is_like', true)->count();
}
public function dislikesCount()
{
    return $this->hasMany(Postlike::class)->where('is_like', 0)->count();
}

}