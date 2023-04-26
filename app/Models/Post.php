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
public function postcomment(){
  return $this->hasMany(Postcomment::class);
}

}