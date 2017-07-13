@extends('layouts.master')



@section('content')
    
    <ul>
    @foreach ($posts as $post)
        <li><a href="{{route('posts.show',$post->id)}}" >{{$post->tilte}} </a></li>
    @endforeach
    </ul>

@endsection('content')



@section('footer')

@endsection('footer')