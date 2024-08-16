<?php

namespace App\Http\Controllers;

use App\services\CompanyService;
use App\services\EmpresarioService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    private EmpresarioService $EService;
    private CompanyService $CService;


    public function __construct(EmpresarioService $service, CompanyService $company)
    {
        $this->EService=$service;
        $this->CService=$company;
    }


    public function index(){
        return $this->EService->main();
    }

    public function changeCompany(Request $request){
        return $this->CService->changeCompany($request);
    }

    public function profile($name){
        return $this->CService->seeProfile($name);
    }
    public function liked(Request $request){return $this->EService->liked($request);}
}
