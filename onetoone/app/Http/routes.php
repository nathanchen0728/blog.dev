<?php
use App\User;
use App\Address;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('insert/{userid}/{addname}', function ($userid,$addname) {
    $user=User::findOrFail($userid);
    echo $user->name;

    $address= new Address([
        'name'=>$addname
    ]);

    $user->address()->save($address);
    echo "存入地址: ".$addname;
    
});

Route::get('update/{userid}/{addname}', function ($userid,$addname) {
    $user=User::findOrFail($userid);
    echo $user->name."<br>";

    $address= Address::where('user_id','=',$userid)->first();
    echo "目前地址: " . $address->name."<br>";
    
    $address->name = $addname;
    $address->save();

    echo "更新地址: ".$address->name;
   
});

Route::get('read/{userid}', function ($userid) {
    $user=User::findOrFail($userid);
    echo $user->name."<br>";

    echo "地址: ".$user->address->name;
});

Route::get('read/{userid}', function ($userid) {
    $user=User::findOrFail($userid);
    echo $user->name."<br>";

    if (count($user->address) ){
        echo "地址: ".$user->address->name;
         }
        else
        {
        echo  "尚未存入地址";
        }
    
});

Route::get('delete/{userid}', function ($userid) {
    $user=User::findOrFail($userid);
    echo $user->name."<br>";

    $addname=$user->address->name;
    $user->address()->delete();
    echo "已刪除地址: ".$addname;

});


