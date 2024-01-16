<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $post = Post::orderBy("id", "asc", )->paginate(10);
        return view("posts.index", compact("post"));
    }

    public function create()
    {
        return view("posts.create");
    }
}
