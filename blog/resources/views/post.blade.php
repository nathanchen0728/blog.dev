@extends('layouts.master') 


@section('content')


    <p> POST 分類: {{$category}} </p>
    <p> POST DATE: {{$date}} </p>
    <p> POST ID: {{$id}} </p>



@endsection


@section('footer')

<script>
 //alert('{{$category}}{{$date}}{{$id}}')
 console.log('{{$category}}{{$date}}{{$id}}')
</script>
@endsection
