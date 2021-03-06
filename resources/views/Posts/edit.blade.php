@extends('layouts/app')
@section('content')
<div class="container">
 <form method="POST" action="/posts/{{$post['id']}}">
 @csrf
 @method('PUT')
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="form-group">

    <label for="exampleInputEmail1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post['title']}}">
  </div>
  <div class="form-group">
    <label for="">Description</label>
<input type="text" name="description" value="{{$post['description']}}"> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
@endsection
