<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Status;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("id", "desc", )->paginate(3)->withQueryString();
        return view("posts.index", compact("posts"));
    }

    public function create()
    {
        $data['statuses'] = Status::all();
        return view("posts.create", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png',
            'title' => 'required|max:350',
            'description' => 'max:500',
            'content' => 'required',
            'tag_id' => 'nullable',
            'status_id' => 'required'

        ]);

        $user = Auth::user();
        $user_id = $user['id'];


        $post = new Post();
        $post->title = $request->title;
        $post->tag_id = $request->tag_id;
        $post->status_id = $request->status_id;
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

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $data['statuses'] = Status::all();
        return view('posts.edit', $data)->with('post', $post);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpg,jpeg,png',
            'title' => 'required|max:350',
            'description' => 'max:500',
            'content' => 'required',
            'tag_id' => 'nullable',
            'status_id' => 'required'

        ]);

        $user = Auth::user();
        $user_id = $user['id'];


        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->tag_id = $request->tag_id;
        $post->status_id = $request->status_id;
        $post->slug = Str::slug($request['title']);
        $post->description = $request->description;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->user_id = $user_id;


        // Remove Old image 
        if ($request->hasFile('image')) {
            $oldphotopath = $post->image;

            if (File::exists($oldphotopath)) {
                File::delete(public_path($oldphotopath));
            }
        }


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

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //Remove Old Imge 
        $path = $post->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $post->delete();
        return redirect()->route('posts.index');
    }

}
