<?php

namespace App\Http\Controllers;

use App\services\CompanyService;
use App\services\GuestService;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //

    private $guestService;
    private $companyService;

    public function __construct(GuestService $service, CompanyService $cservice){
        $this->guestService=$service;
        $this->companyService=$cservice;
    }

    public function index(){
        return $this->guestService->Index();
    }

    public function store(Request $request){
        return $this->companyService->storeCompany($request);
    }
}
