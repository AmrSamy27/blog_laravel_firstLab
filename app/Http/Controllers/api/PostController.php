<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Post;
use App\Http\Requests\StoreBlogRequest;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->paginate(1);
        return  PostResource::collection($posts);
    }
    public function show($id){
        return new PostResource(Post::find($id));
    }
    public function store(StoreBlogRequest $request){
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user()->id;
        $post->photo_name = 'alhlghalkjla.jpg';
        $post->save();
    }
}
