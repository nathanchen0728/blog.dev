<?php
use App\Post;
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

//(å®¢è£½)?Ž§??¶å™¨ä½¿ç”¨?–¹æ³?,?”¨@
Route::get('contact','PostsController@showContact');

//??è¨­
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
    $sql = DB::update('UPDATE posts SET title="??‘æ?›ä??æ¢èŸ²" WHERE id =?',[1]);
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

    //±MÄÝ¤èªk
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