<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    private $loginService;


    public function __construct(LoginService $service){

        $this->loginService=$service;
    }

    public function index(){
        return $this->loginService->Index();
    }

    public function store(Request $request){
        return $this->loginService->login($request);
    }

    public function logOut(Request $request){
        return $this->loginService->logout($request);
    }
}
