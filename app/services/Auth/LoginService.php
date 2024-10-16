<?php

namespace App\services\Auth;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




 class LoginService{

    public function Index(){
        return view('Auth.login');
    }

    public function login(Request $request){


    $user = User::with('company')->where('phone', $request->phone)->first();


    if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {

        $request->session()->regenerate();


        if ($user && $user->company->count() > 0) {

            return redirect()->intended('/company');

        } else {

            if ($user && $user->company->count() == 0) {
                return redirect()->intended('/guest');
            }
        }
    } else {

        return redirect()->back()->withInput()->withErrors(['Invalid credentials']);
    }
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //return redirect()->route('login');
        return response()->json([
            'status' => 200,
            'messsage' => 'Logout feito com sucesso'
        ]);
    }
}
