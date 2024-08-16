<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    private $registerService;

    public function __construct(RegisterService $service){
        $this->registerService=$service;
    }

    /*public function index(){
        return $this->registerService->indexRegister();
    }*/

    /** Register steps */
    public function register1()
    {
        return $this->registerService->register_1();
    }

    public function register_1(Request $request){
        return $this->registerService->register1($request);
    }

    public function register2()
    {
        return $this->registerService->register_2();
    }

    public function register_2(Request $request){
        return $this->registerService->register2($request);
    }

    public function register3()
    {
        return  $this->registerService->register_3();

    }

    public function register_3(Request $request){
         return $this->registerService->register($request);
    }

    public function seeInterest(){
        return $this->registerService->seeInterests();
    }

    public function interest(Request $request){
        return $this->registerService->interests($request);
    }

    /** End Register Steps */

    public function store(RegisterRequest $request){
        return $this->registerService->register($request);
    }

    /** Dropdown methods */
    public function getProvinces(Request $request)
    {
        return $this->registerService->getProvince($request);
    }


    public function getMunicipes(Request $request)
    {
        return $this->registerService->getMunicipe($request);
    }

    public function getNeighbors(Request $request)
    {
        return $this->registerService->getNeighbor($request);
    }
    /** End dropdown methods */
}
