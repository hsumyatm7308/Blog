<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomesController extends Controller
{
    //
    public function index()
    {
        $posts = Post::orderBy("id", "desc", )->paginate(3);
        return view("home.index", compact("posts"));
    }
}
