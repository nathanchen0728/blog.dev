@extends('layouts.master')



@section('content')
    
  
    <h1>{{$post->tilte}} </h1>
    <p>{{$post->fulltxt}} </p>

    <hr/>
    <a class="btn btn-success" href="{{route('posts.edit',$post->id)}}">修改</a>

<!--a.btn.btn-success
input.btn.btn-success-->

@endsection('content')



@section('footer')

@endsection('footer')