@extends('layouts.master')



@section('content')
<form method="post" action="/posts" >
    {{csrf_field()}}

    <div class="form-group row">
        <label for="title" >文章標題</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="請輸入標題">
    </div>
    
    <div class="form-group">
            <label for="fulltext">文章內容</label>
            <textarea class="form-control" name="fulltext" id="fulltext" cols="30" rows="10" placeholder="請輸入內容"/></textarea>
        </div>

    <button type="submit" class="btn btn-primary">存檔</button>
    
</form>
@endsection('content')



@section('footer')

@endsection('footer')