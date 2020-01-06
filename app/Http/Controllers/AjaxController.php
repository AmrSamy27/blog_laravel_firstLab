<?php

namespace App\Http\Controllers;
use App\Http\Responses\PostResponsable;
use Illuminate\Http\Request;
use App\Post;
class AjaxController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        return new PostResponsable($post);
    }
}
