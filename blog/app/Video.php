<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

      //�h���h��h
     public function tags()
    {
        return $this->morphToMany('App\Tag','taggable');
    }

}
