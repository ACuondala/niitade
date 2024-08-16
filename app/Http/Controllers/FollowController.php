<?php

namespace App\Http\Controllers;

use App\services\FollowService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //

    private $followService;

    public function __construct(FollowService $follow)
    {
        $this->followService=$follow;
    }

    public function store(Request $request){
        $this->followService->followCompany($request);
    }

    public function destroy(Request $request){
        $this->followService->unfollow($request);
    }
}
