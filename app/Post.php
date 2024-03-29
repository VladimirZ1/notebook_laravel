<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'post','date','user_id'
    ];

    protected $table = 'posts';
}
