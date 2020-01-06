<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

class commentController extends Controller
{
    public function store($PostId)
    {
        
       $comment = new Comment;
       $comment->body = request()->body;
       $comment->commentable_id = Auth::id();
       $comment->commentable_type= 'App\User';
       $comment->post_id=$PostId;
       $comment->save();
       
        return redirect('posts');
    }
}
