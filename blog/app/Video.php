<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

      //多型多對多
     public function tags()
    {
        return $this->morphToMany('App\Tag','taggable');
    }

}
