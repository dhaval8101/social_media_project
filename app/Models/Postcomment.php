<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Postcomment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'post_comments';
    protected $fillable=[
  'user_id',
  'post_id',
  'comment',
        
    ];

    public function post(){

      return  $this->belongsTo(Post::class);
    }
    public function user(){
      return  $this->belongsTo(User::class);
    }
    public function postcommentlike()
    {
        return $this->hasMany(Postcommentlike::class);
    }
    public function recomment()
    {
        return $this->hasMany(Recomment::class);
    }
  
}