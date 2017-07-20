<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "H W , ID: ";
        //echo "Hello";
        $posts = Post::all();

        //dd($posts);

        return view('posts.index',compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return ("��躰�肽𨯙�匲璇�嚙踢’� C");
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create($request->all());
        

        //return $request->all();
        
        // echo $request->title;
        // echo $request->get('fulltext');
       // dd($request->all());
       
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }

    public function showContact()
    {
        //return view('contact');
        //return view('errors.503');

        $people=['��躰腺嚙踝蕭��匧��嚙踝蕭嚙賢�躰�肽𨯙','嚙踝蕭�����訫�躰�肽𨯙','��躰�肽𨯙��𥪮��航𨯙��辷蕭','��躰�𨀣�惩�躰都嚙賜�𡏭𨯙�焩嚙�'];
        return view('contact',compact('people'));

     }

     public function showPost($category,$date,$id)
    {

        //$arr=array('category'=>$category,'date'=>$date,'id'=>$id,);
       //return view('post')->with($arr);

        return view('post',compact('category','date','id'));
     
     }
}
