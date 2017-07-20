<?php
use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;
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

Route::resource('/posts','PostsController');
//頝舐眏憭芸��,���敶梢𣳽������!
//��碶誨CRUD���撠齿�劐��銵�
// CRUD
// create >> store	�鰵憓𧼮�蠘��
// index // show		��𡑒” // �鱓蝑�憿舐內
// edit >> update		�凒�鰵��蠘��
// destroy		�⏛�膄��蠘��



