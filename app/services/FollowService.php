<?php

namespace App\services;

use App\Models\{User, Company};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class FollowService {

    public function followCompany($request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
        ]);

        $companyToFollow = Company::find($request->company_id);



        if (!$companyToFollow) {
            return response()->json(['error' => 'Company not found.'], 404);
        }

        $follower = Auth::user()->id;


        //$follower->followers()->syncWithoutDetaching($companyToFollow->id);
        $companyToFollow->following()->syncWithoutDetaching($follower);
        return response()->json([
            'status'=>Response::HTTP_OK,
            'message' => 'Company followed successfully.']);
    }

    public function unfollow($request){
        $companyToFollow = Company::find($request->company_id);

        if (!$companyToFollow) {
            return response()->json(['error' => 'Company not found.'], 404);
        }

        $follower = Auth::user()->id;

        //$follower->followers()->syncWithoutDetaching($companyToFollow->id);
        $companyToFollow->following()->detach($follower);
        return response()->json([
            'status'=>Response::HTTP_NO_CONTENT,
            'follow'=>DB::table('followers')->get(),
            'message'=>'Company unfollowed successfuly'
        ]);
    }
}
