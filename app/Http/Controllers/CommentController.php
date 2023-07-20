<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id', // Ensure article_id is provided and exists in the articles table
            'username' => 'required',
            'content' => 'required',
        ]);

        // Create a new comment instance and set its attributes
        $comment = new Comment();
        $comment->username = $request->input('username');
        $comment->content = $request->input('content');
        $comment->article_id = $request->input('article_id'); // Set the article_id here

        // Save the comment to the database
        $comment->save();

        return response()->json([
            'message' => 'Comment added successfully',
            'comment' => $comment,
        ]);
    }
}
