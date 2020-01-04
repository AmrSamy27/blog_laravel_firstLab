<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class commentController extends Controller
{
    public function store()
    {
        $comment = new Comment;
         $comment->body = request()->body ;
         $comment->commentable_id=request()->user()->id;
        $comment->save();
        return redirect('posts');
    }
}
