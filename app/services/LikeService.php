<?php

namespace App\services;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeService{

    public function like($request){
        //$user = Auth::user();

        $user = Auth::user();
        $post = Post::findOrFail($request->post_id);

        $like = $post->likes()->where('user_id', $user->id)->first();
         // Check if the user has already liked the post


        if ($like) {
            // If like exists, delete it (unlike)
            $like->delete();
            return response()->json(['liked' => false, 'count' => $post->likes()->count()]);
        } else {
            // Otherwise, create a new like
            $post->likes()->create(['user_id' => $user->id]);
            return response()->json(['liked' => true, 'count' => $post->likes()->count()]);
        }




    }


}
