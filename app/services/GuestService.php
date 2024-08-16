<?php


namespace App\services;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Interest;
use App\Models\KindCompany;
use App\Models\KindVehicle;
use App\Models\Like;
use App\Models\Municipe;
use App\Models\Plan;
use App\Models\Post;
use App\Models\PostLink;
use App\Models\Products;
use App\Models\Province;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;

class GuestService{

    public function Index(){
        $likedPost=Like::whereIn('id',function($query){
            $query->select("likes.post_id");
            $query->from("likes");
            //$query->where("likes.user_id",Auth::user()->id);
        });
        return view('guest.index',[
            'kind_companies'=>KindCompany::get(),
            'categories'=>Category::get(),
            'provinces'=>Province::get(),
            //'activeCompany'=>Company::with('user')->where('status','active')->where('user_id',Auth::user()->id)->first(),
            'kind_companies'=>KindCompany::get(),
            'categories'=>Category::get(),
            'provinces'=>Province::get(),
            //'companies'=>$merge,
            'posts'=>Post::with(['contents', 'comment'])->orderBy('id','desc')->get(),
            'kindVehicle' => KindVehicle::get(),
            'postLink'=>PostLink::get(),
            'plans'=>Plan::get(),
            'sponsors'=>Sponsor::get(),
            'comments'=>Comment::get(),
            'interest'=>Interest::get(),
            'municipes'=>Municipe::get(),
            'liked'=>$likedPost,
            //'products'=>Products::where('company_id', $activeCompanis->id)->get(),
        ]);
    }

}
