<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\EternityPages as Profile;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Profile $profile)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);
        $comment = Comment::where('user_id', auth()->id())
            ->where('eternity_pages_id', $profile->id)
            ->first();
    
        if ($comment) {
            $comment->update(['comment' => $request->comment]);
        } else {
            $comment = new Comment();
            $comment->user_id = auth()->id();
            $comment->eternity_pages_id = $profile->id;
            $comment->comment = $request->comment;
            $comment->save();
        }
    
        return response()->json(['success' => true, 'comment' => $comment]);
    }
    
}
