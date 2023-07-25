<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'username' => 'required',
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->username = $request->input('username');
        $comment->content = $request->input('content');
        $comment->article_id = $request->input('article_id');
        $comment->status = 0; // Set the status to 0 (pending) by default

        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully. It will be visible after admin approval.');
    }

}
