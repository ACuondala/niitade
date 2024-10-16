<?php


namespace App\services;

use App\Models\Like;
use App\Models\Plan;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Sponsor;
use App\Models\Category;
use App\Models\ExpecificPublic;
use App\Models\Interest;
use App\Models\Municipe;
use App\Models\PostLink;
use App\Models\Products;
use App\Models\Province;
use App\Models\KindCompany;
use App\Models\KindVehicle;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class EmpresarioService{

    public function main(){
        $inactiveCompany=Company::where('status','inactive')->get();
        $activeCompany=Company::where('status','active')->get();
        $merge=$activeCompany->merge($inactiveCompany);

        $activeCompanis=Company::where('status','active')->where('user_id',Auth::user()->id)->first();
        $posts=Post::with(['contents', 'comment'])->orderBy('id','desc')->get();


        $like_total=Post::whereIn('id',function($query) use($posts){
            $query->select('likes.post_id');
            $query->from("likes");
        })->where('company_id', $activeCompanis->id)->count();

        $follow_count=User::whereIn('id', function($query) use($activeCompanis){
            $query->select('followers.user_id');
            $query->from('followers');
            $query->where('followers.company_id',$activeCompanis->id);

        })->count();

        $companyProfileViewCount=Company::with('visitor')->where('id',$activeCompanis->id)->count();

        //dd($like_total);
        return view('company.index',[
            'activeCompany'=>Company::with('user')->where('status','active')->where('user_id',Auth::user()->id)->first(),
            'kind_companies'=>KindCompany::get(),
            'categories'=>Category::get(),
            'provinces'=>Province::get(),
            'companies'=>$merge,
            'kindVehicle' => KindVehicle::get(),
            'countProductVetrine'=>Products::where('company_id',$activeCompanis->id)->count(),
            'postLink'=>PostLink::get(),
            'posts'=>$posts,
            'like_total'=>$like_total,
            'comments'=>Comment::get(),
            'plans'=>Plan::get(),
            'follow_count'=>$follow_count,
            'companyProfileViewCount'=>$companyProfileViewCount,
            'sponsors'=>Sponsor::get(),
            'expecifics_public'=>ExpecificPublic::get(),
            'interest'=>Interest::get(),
            'municipes'=>Municipe::get(),
            'activeCompany'=>$activeCompanis,
            'products'=>Products::where('company_id', $activeCompanis->id)->get(),

        ]);
    }


}
