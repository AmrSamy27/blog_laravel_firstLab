@extends('layouts/app')
@section('content')


<div class="container ">
 <form method="post" class="mt-5" enctype="multipart/form-data" action="/posts">
 @csrf
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
    <label for="title">Title</label>
    <input name="title" type="text" class="form-control" >
  </div>
  <div class="form-group">
    <label for="avatar">Upload Image</label>
    <input name="avatars" type="file"  >
  </div>
  <div class="form-group">
    <label for="description">Description</label>
<textarea name="description" id="" cols="60" rows="10"></textarea>  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
@endsection
