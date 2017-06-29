<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable=['name'];

    Public function user(){
    return $this->belongTo('App\User');
    }

}
