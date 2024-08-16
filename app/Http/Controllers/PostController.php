<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Sponsor;
use Illuminate\Http\Request;

use App\services\PostService;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    //

    private $postService;

    public function __construct(PostService $post)
    {
        $this->postService=$post;
    }

    public function index(){
        return $this->postService->getAllPost();
    }

    public function store(Request $request){

        $this->postService->createPost($request);
        return redirect()->route("companies.index");


    }

    public function postViewCount(Request $request){
        return $this->postService->postViewCount($request);
    }

    public function getPlanPrice(Request $request){return response()->json([
        'status'=>Response::HTTP_OK,
        'planPrice'=>Plan::where('id',$request->id)->get()
    ]);}

    public function getSponsorPrice(Request $request){return response()->json([
        'status'=>Response::HTTP_OK,
        'sponsorPrice'=>Sponsor::where('id',$request->id)->value('price')
    ]);}
}
