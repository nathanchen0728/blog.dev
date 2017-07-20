@extends('layouts.master')



@section('content')
<form method="post" action="/posts/{{$post->id}}" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
<!--{!! Form::model($post,['method' => 'put','action' => ['PostsController@update',$post->id]]) !!}-->

    <div class="form-group row">
        {!!Form::label('title', '文章標題')!!}
       <!--<label for="title" >文章標題</label>-->
        <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
    </div>
    
    <div class="form-group">
            <label for="fulltext">文章內容</label>
            <textarea class="form-control" name="fulltext" id="fulltext" />{{$post->fulltext}}</textarea>
        </div>

    <button type="submit" class="btn btn-info">修改並存檔</button>
    
<!--</form>-->
{!! Form::close() !!}

<!--<form method="post" action="/posts/{{$post->id}}" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">-->
{!! Form::open(['method' => 'delete','action' => ['PostsController@destroy',$post->id]]) !!}

    <button type="submit" class="btn btn-danger">刪除</button>
    <!--{!!Form::submit('刪除',['class' => 'btn btn-danger'])!!}-->

<!--</form>-->
{!! Form::close() !!}

@endsection('content')



@section('footer')

@endsection('footer')