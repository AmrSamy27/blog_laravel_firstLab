@extends('layouts/layout')
@section('content')

<nav id="navBar" class="navbar navbar-expand-lg navbar-dark bg-dark  mb-5  ">
                <a class="navbar-brand text-white" href="/posts">ITI Blog</a>
                
              <!-- class colapse to make it colapsed by default till toggler is pressed navbar-collaps to make it appear -->
                
                      <a class="navbar-brand text-white "  href="/posts">All Posts <span class="sr-only">(current)</span></a>
                   
              </nav>
<div class="container ">
 <form method="post" class="mt-5" action="/posts">
 @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input name="title" type="text" class="form-control" >
  </div>
  <div class="form-group">
    <label for="description">Description</label>
<textarea name="description" id="" cols="60" rows="10"></textarea>  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
@endsection
