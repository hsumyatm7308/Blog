<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentsController extends Controller
{

    public function edit(string $id)
    {
        $comments = Comment::findOrFail($id);
        return view("posts.edit", $comments);

    }

    // In your CommentController
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('posts.show', compact('comment'));
    }

    public function store(Request $request)
    {

        $user = Auth::user();
        $user_id = $user['id'];

        Comment::create([
            'description' => $request['description'],
            'user_id' => $user_id,
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => $request['commentable_type']
        ]);

        return redirect()->back();

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'editdescription' => 'required',
        ]);

        $comment = Comment::findOrFail($id);
        $user = Auth::user();
        $user_id = $user->id;

        $comment->description = $request->input('editdescription');
        $comment->user_id = $user_id;

        $comment->save();

        return redirect(route('posts.show', $comment->commentable_id))->with('success', 'Comment updated successfully');
    }

}
