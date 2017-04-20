<?php

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

//(客製)控制器使用方法,用@
Route::get('contact','PostsController@showContact');

//預設
//Route::resource('posts','PostsController');

/*
Route::get('/about', function () {
    return "Page :About";
});

Route::get('/contact', function () {
    return 'Page :Contact';
});

Route::get('/post/{ID}/{NAME}', function ($id,$name) {
    return "Post Article ID:". $id ."NAME:".$name;
});
*/


//Route::get('post/{id}','PostsController@index');
Route::get('post/{category}/{date}/{id}','PostsController@showPost');


