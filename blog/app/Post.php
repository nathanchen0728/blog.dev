<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    //protected $fillable=['title','fulltext'];//�զW��
    //protected $guarded=['is_admin'];//�¦W��

    use SoftDeletes;

    protected $dates=["deleted_at"];
}
