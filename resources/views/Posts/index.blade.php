@extends('layouts/app')
@section('content')
<div class="container-fluid">
<div class="row">
<table class="table">
<thead>
    <tr>
     
     
      <a href="/posts/create" class="btn btn-success ml-5">Create Post</a>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Soft Delete</th>

      <th scope="col">Created By</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>

      <th scope="col">Post Image</th>
      <th scope="col">Comment</th>
      <th scope="col">Put Your Comment</th>

      <th scope="col">Created At</th>

      <th scope="col">Actions</th>
    </tr>
  </thead>

  <tbody>
  @foreach($posts as $index=>$post)
  @if(!$post->trashed())
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>
      <div class="col-md-2 ">

<form method="post" action="/posts/softDelete/{{$post['id']}}">@csrf @method('DELETE')<button onclick="return confirm('Are you sure you want to  temporary delete this post?')" class="btn btn-danger mr-5">Soft Delete</button>
</form>
</div></td>
      <td>{{$post->user->name}}</td>
      <td>{{$post['title']}}</td>
      <td>{{$post['slug']}}</td>
      <td>    <img src="{{asset($post['photo_name'])}}" width="100" height="100" alt="No Image">
</td>
<td>
   
   @foreach($users as $index=>$user) 
   @foreach($user->comments as $comment)
   @if($post['id'] == $comment->post_id)
   <p>
{{$user->name}}: 



{{$comment->body}}
</p>
@endif
@endforeach
@endforeach

</td>
 <td><form method="post"  enctype="multipart/form-data" action="/posts/{{$post['id']}}">
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
    <label for="body">Comment</label>
    <input name="body" type="text" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form></td>

      <td>{{$post['created_at']}}</td>
      <td>
      <div class="row">
      <div class="col-md-2 mr-2">
      <a href="/posts/{{$post['id']}}"  class="btn btn-primary ">View</a>
      </div>
<button id="ajax{{$post['id']}}" type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter{{$post['id']}}">
  Ajax Data
</button>

<div class="modal fade" id="exampleModalCenter{{$post['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Post Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="postInfo">
        <p class="col-md-12" id="{{'title'.$post['id']}}">Title: </p>
        <p class="col-md-12" id="description{{$post['id']}}">Description: </p>
        <p class="col-md-12" id="{{'slug'.$post['id']}}">Slug: </p>

    </div>
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Created By</h5>
        
      </div>
      <div class="modal-body" id="creatorInfo">
      <p class="col-md-12" id="name{{$post->id}}">Name: </p>
        <p class="col-md-12" id="email{{$post->id}}">Email: </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
      <div class="col-md-1 mr-4">

      <form method="get" action="/posts/{{$post['id']}}/edit"><button class="btn btn-primary ">Edit</button>
      </form>
      </div>

    <div class="col-md-1 ">

      <form method="post" action="/posts/{{$post['id']}}">@csrf @method('DELETE')<button onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-danger ">Delete</button>
      </form>
      </div>
      </td>
      

    </tr>
   
<script>
document.getElementById("ajax{{$post['id']}}").addEventListener('click',function(){
  fetch("http://127.0.0.1:8000/posts/ajax/{{ $post['id'] }}").then(function(response){
   return response.json();
}).then(function(result){
createElementForPost(result);
}).catch(function(error){
alert(error);
});
})

</script>
@elseif($post->trashed())
<tr><td>
      <div class="col-md-2 ">

<form method="get" action="/posts/restoreDeleted/{{$post['id']}}"><button  type="submit" class="btn btn-danger mr-5">Restore</button>
</form>
</div></td></tr>
@endif
   @endforeach
  </tbody>
</table>

</div>
</div>
<script >
function createElementForPost(post){
   document.getElementById("title"+post.id).innerHTML+=post.title;
    document.getElementById('description'+post.id).innerHTML+=post.description;
    document.getElementById('slug'+post.id).innerHTML+=post.slug;

    document.getElementById('name'+post.id).innerHTML+=post.user.name;
    document.getElementById('email'+post.id).innerHTML+=post.user.email;

  }
</script>
{{$posts->links()}}
@endsection
 