<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
        $comments=Comment::all();
        $posts = Post::paginate(2);
        return view('index', ['posts' =>$posts,'comments'=>$comments]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(StoreBlogRequest $request)
    {
        $post = new Post;
         $image =  Storage::putFile('images', $request->file('avatars'));
         $request->avatars->move(public_path('images'), $image);
        $post->fill(['title'=>$request->title , 'description'=>$request->description,'user_id'=>$request->user()->id ,'photo_name'=>$image ]);
        $post->save();
        return redirect('posts');
    }
    public function show($id)
    {
        return view('post', ['post' => post::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('edit', ['post' => post::findOrFail($id)]);
    }
    public function update($id,StoreBlogRequest $request)
    {
      
        $post = Post::find($id);
        $post->photo_name = '';
        $post->title = $request->title;

        $post->description = $request->description;
        $post->save();
        return redirect('posts');
    }
    public function destroy($id)
    {
        $post =Post::find($id);
        $post->forceDelete();
        return redirect('posts');
    }
}
