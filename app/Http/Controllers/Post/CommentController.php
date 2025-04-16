<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeComment(Request $request, $id)
    {

        if (!Post::where('id', $id)->exists() || !Post::where('id', $id)->where('is_published', true)->exists()) {
            return back()->with('error', 'Post not found.');
        }

        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::id();  // Assuming the user is authenticated
        $comment->post_id = $id;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);

        // Ensure the user is the owner of the comment
        if ($comment->user_id !== Auth::id()) {
            return back()->with('error', 'You are not authorized to delete this comment');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }

    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment = Comment::findOrFail($id);

        // Ensure the user is the owner of the comment
        if ($comment->user_id !== Auth::id()) {
            return back()->with('error', 'You are not authorized to update this comment');
        }

        $comment->comment = $request->input('comment');
        $comment->save();

        return back()->with('success', 'Comment updated successfully!');
    }


}
