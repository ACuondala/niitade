<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    //

    private $commentService;

    public function __construct(CommentService $comment)
    {
        $this->commentService=$comment;
    }

    public function all($id){
        $comments=Comment::with('user')->where('post_id',$id)->latest()->get();
        return response()->json([
            'comments'=>$comments,
            'status'=>200
        ]);
    }

    public function commentStore(Request $request){
        return $this->commentService->storeComment($request);
    }
}
