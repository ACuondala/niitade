<?php

namespace App\services;

use App\Models\Municipe;
use App\Models\Neighbor;
use App\Models\Province;
use App\Models\User;
use App\traits\UploadFiles;
use Illuminate\Support\Facades\Auth;


class ProfileUserService{
    use UploadFiles;
    public function index(){
        $user=User::find(Auth::user()->id);
        if(!$user){
            return redirect()->back();
        }
        return view('user_profile.profile',[
            'user'=>$user,
            'provinces'=>Province::get(),
            'municipes'=>Municipe::get(),
            'neighbors'=>Neighbor::get()]);
    }

    public function updateProfile( $request){
        $user=User::find(Auth::user()->id);

        if(!$user){
            return redirect()->back();
        }

        $user->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'gender'=>$request->gender,
            'dob'=>$request->birthday,
            'neighbor_id'=>$request->neighborhood_id
        ]);
        return $user;
    }
    public function updatePhoto( $request){
        $user=User::find(Auth::user()->id);

        if(!$user){
            return redirect()->back();
        }
        $userImages=$this->uploadFile($request,$request->images, "/nitade/users");

        //dd( $userImages);
        $user->update([
            'images'=>$userImages
        ]);
        return $user;
    }
}
