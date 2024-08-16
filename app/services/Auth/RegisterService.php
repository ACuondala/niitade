<?php

namespace App\Services\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\Country;
use App\Models\Interest;
use App\Models\InterestUser;
use App\Models\Municipe;
use App\Models\Neighbor;
use App\Models\Province;
use App\Models\User;
use App\traits\UploadFiles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class RegisterService{

    use UploadFiles;

    /*public function indexRegister(){

        return view('Auth.register',[
            'countries'=>Country::get()
        ]);

    }*/

    public function register_1()
    {
        return view('Auth.register.register_1');
    }

    public function register1($request){

        $request->validate([
            'firstname'=>['required', 'string', 'max:15', 'min:3'],
            'lastname'=>['required', 'string', 'max:15', 'min:3'],
            'dob'=> ['required', 'date', 'before:-14 years'],
            'images'=>['mimes:png,jpg,jpeg']
        ]);

        if (isset($request->images)) {
            $user_image=$this->uploadFile($request,$request->images, 'nitade/users' );

        }else if($request->images == 'M'){
            $user_image='/nitade/users/men.jpg';
        }else{
            $user_image='/nitade/users/female2.jpeg';
        }

        // Store the data in session
        session(['register1' =>array_merge(
            $request->only('firstname', 'lastname', 'images', 'dob', 'gender'),
            ['images'=>$user_image]
        )]);

        return redirect()->route('register2');

    }

    public function register_2()
    {
        return view('Auth.register.register_2');
    }

    public function register2( $request){

        $request->validate([
            'phone'=>['required','integer','unique:users'],
            'password'=>['required'],
            'confirm'=>['same:password'],
            'otherphone'=>['nullable','integer'],
        ]);
        // Store the data in session
        session(['register2' => $request->only('phone', 'otherphone', 'password', 'confirm')]);

        return redirect()->route('register3');

    }

    public function register_3()
    {
        return view('Auth.register.register_3',[
            'countries'=>Country::get()
        ]);
    }

    public function register( $request){

        $request->validate([
            'terms'=>['required'],
        ]);

        $step1 = session('register1');
        $step2 = session('register2');
        $step3 = $request->only('neighbor_id', 'terms');





        DB::beginTransaction();
        try{
            $users=User::create([
                'firstname'=>$step1['firstname'],
                'lastname'=>$step1['lastname'],
                'phone'=>$step2['phone'],
                'gender'=>$step1['gender'],
                'terms'=>$step3['terms'],
                'dob'=>$step1['dob'],
                'password'=>Hash::make($step2['password']),
                'otherphone'=>$step2['otherphone'],
                'images'=>$step1['images'],
                'neighbor_id'=>$step3['neighbor_id']
            ]);
            Auth::login($users);
            DB::commit();
            session()->forget(['register1', 'register2']);
            return redirect()->route('guest.indxe');

        }
        catch(Exception $e){
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function seeInterests(){
        return view('Auth.interest',['interests'=>Interest::get()]);
    }

    public function interests( $request){

       //try{


            //DB::beginTransaction();
                $user =User::find(Auth::user()->id);
                //dd($request->interesses);
                if ($user) {
                    //dd( $user->interests()->sync($request->interesses));
                    //$user->interests()->sync($request->interesses);
                    foreach($request->interesses as $key=>$interest){
                        $interest_user=InterestUser::create([
                            'user_id'=>Auth::user()->id,
                            'interest_id'=>$interest
                        ]);
                    }

                    if ($user->company->count() > 0) {
                        //DB::commit();
                        return redirect()->route('companies.index');
                    } else {
                        //DB::commit();
                        return redirect()->route('guest.indxe');
                    }
                }

                //DB::rollBack();
                //return redirect()->back()->withErrors(['User not found']);

        //}catch (Exception $e) {
        //DB::rollBack();
        //return redirect()->back()->withErrors(['Error attaching interests: ' . $e->getMessage()]);
        //}
    }

    public function getProvince(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'All provinces were listed successfully',
            'provinces' => Province::where('country_id', $request->country)->get()
        ]);
    }


    public function getMunicipe(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'All Municipes were listed successfully',
            'municipes' => Municipe::where('province_id', $request->provinces)->get()
        ]);
    }

    public function getNeighbor(Request $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'All neighbors were listed successfully',
            'neighbors' => Neighbor::where('municipe_id', $request->municipe)->get()
        ]);
    }

}
