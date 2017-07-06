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
//路由太多,會影響效能!
//取代CRUD的對應七行
// CRUD
// create >> store	新增功能
// index // show		列表 // 單筆顯示
// edit >> update		更新功能
// destroy		刪除功能



