<?php
use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
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

//(摰Ｚˊ)?綉??嗅膥雿輻鍂?䲮瘜?,?鍂@
Route::get('contact','PostsController@showContact');

//??鞱身
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


/*
Route::get('/insert', function () {
    DB::insert('INSERT INTO posts (title,`fulltext`) VALUES (?,?)',['Hi','Hello Word']);
});

Route::get('/read', function () {
    $results = DB::select('SELECT * FROM posts WHERE id=?',[2]);

    foreach($results as $results)
    {
        return $results->title;
    }

    //var_dump($results);
});



Route::get('/update', function () {
    $sql = DB::update('UPDATE posts SET title="??烐?𥕢??璇肽酑" WHERE id =?',[1]);
    return var_dump($sql);
});

Route::get('/delete', function () {
    $sql = DB::delete('DELETE FROM posts WHERE id =?',[1]);
    return var_dump($sql);
});
*/



Route::get('read',function(){

    $posts=Post::all();
    return $posts;

   //$posts= Post::WHERE('is_admin',0)
   //             ->orderby('id','desc')
   //             ->take(2)
   //             ->get();
    

    //$posts= Post::find(2);
    
    //$posts= Post::WHERE('is_admin',0)->first();
    //return $posts->title;
    

    //foreach($posts as $post){
    //    echo $post->id . ": " . $post->fulltext. "<br>\n";
    //}

});

Route::get('insert/{title}/{fulltext}',function($title,$fulltext){
    $post=new Post;

    $post->title="$title";
    $post->fulltext="$fulltext";

    $post->save();
});

Route::get('create',function(){
   Post::create([
       'title'=>'123',
        'fulltext'=>'999',
   ]);

});

Route::get('update/{id}/{title}/{fulltext}',function($id,$title,$fulltext){
    //$post=Post::find($id);
    //$post->title="$title";
    //$post->fulltext="$fulltext";
    //$post->save();

    //專屬方法
    Post::WHERE('id',$id)->WHERE('is_admin',0)
        ->update([
            'title'=>$title,
            'fulltext'=>$fulltext
        ]);

});

Route::get('delete/{id}',function($id)
{
    $post=Post::find($id);
    $post->delete();
});

Route::get('delete',function()
{
    Post::destroy([2,5,6]);
});

Route::get('readall',function()
{
    
    $posts=Post::withTrashed()->get();
    return $posts;
});

Route::get('onlytrash',function()
{
    
    $posts=Post::onlyTrashed()->get();
    return $posts;
});

Route::get('restore',function(){

    Post::onlyTrashed()->restore();
    
});

Route::get('forcedelete',function(){

    Post::onlyTrashed()->forceDelete();

});

Route::get('forcedelete/{id}',function($id){

    Post::find($id)->forceDelete();

});

Route::get('user/{userid}/post',function($userid){

    //return User::find($userid)->post->title;

    echo  User::find($userid)->post->title."<BR>\n" ;

});

Route::get('post/{postid}/user',function($postid){

    //return User::find($userid)->post->title;
    
    echo  Post::find($postid)->user->name."<BR>\n" ;

});

Route::get('user/{userid}/posts',function($userid){

    $user=User::find($userid);

    foreach($user->posts as $post){
        echo $post->title."<br>\n";
    } 

});

Route::get('user/{userid}/role',function($userid){

    //$user=User::find($userid);

    //foreach($user->roles as $role){
        //return $role->name;
       // echo $role->name."<br>\n";
    //} 
    //取用rolse屬性
    
    $role = User::find($userid)->roles()->orderBy('id','desc')->get();
    return $role;
    //呼叫roles()方法


});

Route::get('role/{roleid}/user',function($roleid){

    $user=Role::find($roleid)
        ->users()
        ->orderBy('id','desc')
        ->get();

    return  $user;
});

Route::get('country/{countryid}/{userid}/posts',function($countryid,$userid){

    $country=Country::find($countryid);

    foreach($country->posts as $post){
        echo $post->title."<br>\n";
    }
    //return  $country;
});

Route::get('user/{userid}/photos',function($userid){

    $user=User::find($userid);

    foreach($user->photos as $photo){
        //echo $post->title."<br>\n";
        return $photo;
    }
    
});

Route::get('post/{postid}/photos',function($postid){
    
    $post=Post::findOrFail($postid);
    echo $post->title."<br>\n";
    
    foreach($post->photos as $pohto){
       echo $post->path."<br>\n";
        //return  $photo;
    }
    
});