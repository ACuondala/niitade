<?php

namespace App\Services;

use App\Models\{Comment,
Post};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CommentService{



    public function storeComment($request){

        $posts=Post::find($request->post_id);


        $comments= Comment::create([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
            'post_id'=>$posts->id
        ]);

         return response()->json([
            'comments'=>Comment::with(['post','user'])->latest()->get(),
            'count'=>$posts->comment()->count(),
            'status'=>201
         ]);

    }
}
