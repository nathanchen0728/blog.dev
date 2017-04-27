@extends('layouts.master') 


@section('content')


<div class="members">
推薦職業:      
@if(count($people))

@foreach($people as $hero)

<li>{{$hero}}</li>

@endforeach

@endif    
    
</div>


<address>
  <strong>Twitter, Inc.</strong><br>
  1355 Market Street, Suite 900<br>
  San Francisco, CA 94103<br>
  <abbr title="Phone">P:</abbr> (123) 456-7890
</address>

<address>
  <strong>Full Name</strong><br>
  <a href="mailto:#">first.last@example.com</a>
</address>




@endsection