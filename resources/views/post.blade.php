@extends('layouts/layout')
@section('content')
<div class="container">
<div class="row">
<table class="table">
<thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"> </th>
      <th scope="col"><a href="/posts/create" class="btn btn-success">Create Post</a></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <thead>
    
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
  </thead>

  <tbody>
  @if($post)
    <tr>
      <th scope="row">ID</th>
      <td>{{$post['id']}}</td>

    </tr>
    <tr>
      <th scope="row">Title</th>
      <td>{{$post['title']}}</td>

    </tr>
    <tr>
      <th scope="row">Description</th>
      <td>{{$post['description']}}</td>

    </tr>
    <tr>
      <th scope="row">Created At</th>
      <td>{{$post['created_at']}}</td>

    </tr>
    <tr>     
     <td>
     <div class="row">
     <div class="col-md-6">
    <form class="" method="get" action="/posts/{{$post['id']}}/edit">
    <button class="btn btn-primary">Edit</button>
    </form>
    </div>
    <div class="col-md-6">
    <form method="post" action="/posts/{{$post['id']}}">
    @csrf @method('DELETE')<button onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-danger">Delete</button>
    </form>
    </div>
    </div>
    </td>
</tr>

   @endif
  </tbody>
</table>
</div>
</div>
@endsection