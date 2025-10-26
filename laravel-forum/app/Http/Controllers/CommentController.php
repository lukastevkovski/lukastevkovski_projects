<?php
namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    public function store(Request $request, Discussion $discussion) {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'discussion_id' => $discussion->id,
        ]);

        return redirect()->route('discussions.show', $discussion)->with('success', 'Comment added.');
    }
}