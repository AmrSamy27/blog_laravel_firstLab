@extends('layouts/app')
@section('content')
<div class="container">
<div class="row">
@if($post)

<table class="table">
<thead>
    <tr>
      <th scope="col">Post Info</th>
      <th scope="col"> </th>
      <th scope="col"></th>
      <th scope="col"><a href="/posts/create" class="btn btn-success">Create Post</a></th>
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

  
  </tbody>
</table> 


<table class="table">
<thead>
    <tr>
      <th scope="col">Post Creator Info</th>
      <th scope="col"> </th>
      <th scope="col"></th>
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
  
    <tr>
      <th scope="row">Name</th>
      <td>{{$post->user->name}}</td>

    </tr>
    <tr>
      <th scope="row">Email</th>
      <td>{{$post->user->email}}</td>

    </tr>
    <tr>
      <th scope="row">Registered At</th>
      <td>{{$post->user->created_at}}</td>

    </tr>
    
   

  
  </tbody>
</table> 
@endif
</div>
</div>
@endsection