<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=['title','fulltext'];//�զW��
    //protected $guarded=['is_admin'];//�¦W��
}
