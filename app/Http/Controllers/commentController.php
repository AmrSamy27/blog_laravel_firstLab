<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class commentController extends Controller
{
    public function store($id)
    {
        $post = Post::find($id);
        $post->comments()->create([
            'body' => request()->body,
        ]);
       
        return redirect('posts');
    }
}
