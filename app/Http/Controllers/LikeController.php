<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\EternityPages as Profile;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Profile $profile)
    {
        $like = Like::where('user_id', auth()->id())
        ->where('eternity_pages_id', $profile->id)
        ->first();

        if ($like) {
            $like->delete();
        } else {
            $like = new Like();
            $like->user_id = auth()->id();
            $like->eternity_pages_id = $profile->id;
            $like->save();
        }

        $countLike = Like::where('eternity_pages_id', $profile->id)->count();
        return $countLike;
    }
}
