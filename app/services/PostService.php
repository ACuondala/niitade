<?php
Namespace App\services;

use App\Models\Company;
use App\Models\ExpecificPublic;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Postview;
use App\Models\Sponsor;
use App\Models\User;
use App\traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PostService{
    use UploadFiles;
    public function getAllPost(){

        return response()->json([
            'posts'=>Post::with(['contents', 'comments','company'])->latest()->get(),
            'status'=>Response::HTTP_OK,
            'message'=>'Posts listed successfully'
        ]);
    }


    public function createPost(Request $request){
        $activeCompanis=Company::where('status','active')->where('user_id',Auth::user()->id)->first();
        $user=Auth::user();

        if($request->cost <= Auth::user()->money){
            DB::beginTransaction();

            $desconto=$user->money - $request->cost;

            //dd($desconto);

            $posts=Post::create([
                'namePost'=>$request->name,
                'titlePost'=>$request->title,
                'category_id'=>$request->category_id,
                'description'=>$request->description,
                'product_id'=>$request->product_id,
                'company_id'=>$activeCompanis->id,
                'post_link_id'=>$request->postLink,
                'plan_id'=>$request->plan_id ?? null,
                'cost'=>$request->cost,
                'sponsor_id'=>$request->sponsor_id ?? null,
                'expecific_public_id'=>$request->expecific ?? null
            ]);
            //if($desconto != 0){
                $user->update(['money' => $desconto]);

            //}
            if(isset($request->images)){

                $contents = $request->images;
                foreach ($contents as $content) {
                    $contentStorage=$this->uploadFile($request,$content, 'nitade/post/content/' );
                    $posts->contents()->create([
                        "files"=>$contentStorage,
                        "post_id"=>$posts->id
                    ]);

                }
            }

            DB::commit();
            return $posts;
        }else{
            return redirect()->back();
        }
    }

    public function postViewCount(Request $request){
        $post=Post::find($request->post_id)->first();
        if($post){
            //$postviews=Postview::where('user_id',Auth::user()->id)->first();
            //if(!$postviews){
                $postview=Postview::create([
                    'post_id'=>$request->post_id,
                    'user_id'=>Auth::user()->id
                ]);

                return response()->json(['success' => true, 'views' =>$post->postview()->count() ]);
           // }
        }
    }
}
