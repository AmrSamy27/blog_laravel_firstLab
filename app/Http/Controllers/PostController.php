<?php

namespace App\Http\Controllers;

use App\posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = posts::paginate(2);
        return view('index', ['posts' =>$posts]);
    }
    public function create()
    {
        return view('create');
    }
    public function store()
    {
        $post = new Posts;
        $post->fill(['title'=>request()->title , 'description'=>request()->description]);
        $post->save();
        return redirect('posts');
    }
    public function show($id)
    {
        return view('post', ['post' => posts::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('edit', ['post' => posts::findOrFail($id)]);
    }
    public function update($id)
    {
        $post = posts::find($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->save();
        return redirect('posts');
    }
    public function destroy($id)
    {
        $post =posts::find($id);
        $post->forceDelete();
        return redirect('posts');
    }
}
