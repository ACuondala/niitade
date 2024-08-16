<?php

namespace App\Http\Controllers;


use App\services\ProfileUserService;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    //
    private $profileUser;

    public function __construct(ProfileUserService $service){
        $this->profileUser=$service;
    }
    public function index(){
        return $this->profileUser->index();
    }

    public function update(Request $request){
        $user=$this->profileUser->updateProfile($request);
        return redirect()->back();
    }

    public function updatefoto(Request $request){
        $user=$this->profileUser->updatePhoto($request);
        return redirect()->back();
    }
}
