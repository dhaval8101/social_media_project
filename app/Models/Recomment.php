<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomment extends Model
{
    use HasFactory;
    protected $table='recomments';
    protected $fillable= [

        'recomment',
        'user_id',
        'post_id',
        'postcomment_id',
    ];
}