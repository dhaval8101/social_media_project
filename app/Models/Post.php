<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
  'title',
  'user_id',
  'image',
  'content'
        
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function like(){
      $this->belongsToMany(User::class);
    }
}