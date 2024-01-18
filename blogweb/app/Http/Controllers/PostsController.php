<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("id", "asc", )->paginate(10);
        return view("posts.index", compact("posts"));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png',
            'title' => 'required|max:350',
            'description' => 'max:500',
            'content' => 'required',
            'tag_id' => 'nullable'

        ]);

        $user = Auth::user();
        $user_id = $user['id'];


        $post = new Post();
        $post->title = $request->title;
        $post->tag_id = $request->tag_id;
        $post->slug = Str::slug($request['title']);
        $post->description = $request->description;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->user_id = $user_id;


        //Single Image Upload 
        if (file_exists($request['image'])) {
            $file = $request['image'];
            $fname = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id) . $post['id'] . $fname;
            $file->move(public_path('assets/img/posts/'), $imagenewname);

            $filepath = "assets/img/posts/" . $imagenewname;
            $post->image = $filepath;
        }

        $post->save();

        return redirect(route('posts.index'));



    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
