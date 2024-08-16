<?php

namespace App\Http\Controllers;

use App\services\FavoritesServices;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //

    private $service;

    public function __construct(FavoritesServices $_service)
    {
        $this->service=$_service;
    }

    public function index(){
        return $this->service->getAll();
    }

    public function store(Request $request){
        return $this->service->save($request);
    }
}
