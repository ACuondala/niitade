<?php

namespace App\services;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FavoritesServices{

    public function getAll(){
        $favorites=Favorite::with('post')->where('user_id',Auth::user()->id)->latest();
        /*return response()->json([
            'status'=>Response::HTTP_OK,
            'message'=>"Favorites listed successfully",
            'favorites'=>$favorites
        ]);*/
        return view('favourites.favourites',['favorites'=>$favorites]);
    }

    public function save($request){

        $user = Auth::user();
        $post = Post::find($request->post_id);

        $favorites = $post->favorites()->where('user_id', $user->id)->first();
         // Check if the user has already liked the post


         if (isset($favorites)) {
            // If like exists, delete it (unlike)
            $favorites->delete();
            return response()->json(['favorited' => false]);
        } else {
            // Otherwise, create a new like
            $post->favorites()->create(['user_id' => $user->id]);
            return response()->json(['favorited' => true]);
        }
    }


}
