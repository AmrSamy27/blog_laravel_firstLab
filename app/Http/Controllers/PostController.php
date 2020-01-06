<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Rules\LimitPosts;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Responsable;


class PostController extends Controller
{
    public function index()
    {   

        $users = User::all();
        $posts = Post::withTrashed()->paginate(2);
        return view('Posts/index', ['posts' =>$posts,'users'=>$users]);
    }
    public function create()
    {
        return view('Posts/create');
    }
    public function store(StoreBlogRequest $request)
    {
        $request->validate([
            'title'=>[new LimitPosts]
    ]);
        $post = new Post;
         $image =  Storage::putFile('images', $request->file('avatars'));
         $request->avatars->move(public_path('images'), $image);
        $post->fill(['title'=>$request->title , 'description'=>$request->description,'user_id'=>$request->user()->id ,'photo_name'=>$image ]);
        $post->save();
        return redirect('posts');
    }
    public function show($id)
    {
        return view('Post/post', ['post' => post::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('Post/edit', ['post' => post::findOrFail($id)]);
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
    public function softDelete($id){
        $post =Post::find($id);
        $post->Delete();
        return redirect('posts');
    }
    public function restoreDeleted($id){
        Post::withTrashed()->find($id)->restore();
        return redirect('posts');
    }
    
}
