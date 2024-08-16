<?php

namespace App\Http\Controllers;

use App\services\DeliveryService;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    //

    private $delivery;

    public function __construct(DeliveryService $delivery)
    {
        $this->delivery=$delivery;
    }

    public function store(Request $request){
        return $this->delivery->storeDelivery($request);
    }

    public function getMarca(Request $request)
    {
        return $this->delivery->getMarcas($request);
    }

    public function getModelo(Request $request)
    {
        return $this->delivery->getModelos($request);
    }
}
