@extends('layouts/app')
@section('content')
<div class="container">
<div class="row">
<table class="table">
<thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"><a href="/posts/create" class="btn btn-success">Create Post</a></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Created By</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Post Image</th>

      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

  <tbody>
  @foreach($posts as $index=>$post)
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post->user->name}}</td>
      <td>{{$post['title']}}</td>
      <td>{{$post['slug']}}</td>
      <td>    <img src="{{asset($post['photo_name'])}}" width="100" height="100" alt="No Image">
</td>

      <td>{{$post['created_at']}}</td>
      
      <td>
      <div class="row">
      <div class="col-md-2 mr-2">
      <a href="/posts/{{$post['id']}}"  class="btn btn-primary">View</a>
      </div>

      <div class="col-md-2">

      <form method="get" action="/posts/{{$post['id']}}/edit"><button class="btn btn-primary">Edit</button>
      </form>
      </div>

    <div class="col-md-2 ">

      <form method="post" action="/posts/{{$post['id']}}">@csrf @method('DELETE')<button onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-danger">Delete</button>
      </form>
      </div>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
</div>
{{$posts->links()}}
@endsection
