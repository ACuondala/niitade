<?php

namespace App\Http\Controllers;

use App\services\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    private $likeService;

    public function __construct(LikeService $service)
    {
        $this->likeService=$service;
    }

    public function likes(Request $request){
        return $this->likeService->like($request);
    }

    public function reverseLikes(Request $request){
        return $this->likeService->reverseLike($request);
    }
}
