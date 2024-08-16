<?php

namespace App\services;

use App\Models\Delivery;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Vehicle;
use App\traits\UploadFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class DeliveryService{
    use UploadFiles;
    public function storeDelivery( $request){
        //dd($request->all());

        DB::beginTransaction();


        $deliveryimgStorage=$this->uploadFile($request,$request->images, "/nitade/delivery/image");
        $cartadocStorage=$this->uploadFile($request,$request->cartaConducao, "/nitade/delivery/Document");
        $bidocStorage=$this->uploadFile($request,$request->bi, "/nitade/delivery/Document");
        $rcdocStorage=$this->uploadFile($request,$request->registroCriminal, "/nitade/delivery/Document");
        $car1docStorage=$this->uploadFile($request,$request->carImage1, "/nitade/delivery/carImage/main");




        $delivery = Delivery::create([
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "deliveryImage" => $deliveryimgStorage,
            "bi" => $bidocStorage,
            "carta" => $cartadocStorage,
            "registroCriminal" => $rcdocStorage,
            "phone" => $request->phone,
            "address" => $request->address,
            "neighbor_id" => $request->bairro_id,
        ]);

        $vehicles = Vehicle::create([
            "matricula" => $request->matricula,
            'Carimages' => $car1docStorage,
            'delivery_id' => $delivery->id,
            'kind_vehicle_id' => $request->kindVehicle_id,
            'modelo_id' => $request->model_id,
        ]);

        if (isset($request->carImage2)) {
            $cars2 = $request->carImage2;
            foreach ($cars2 as $car2) {

                $car2docStorage=$this->uploadFile($request,$car2, "/nitade/delivery/carImage/other");

                $vehicles->image()->create([
                    "othercarImage" => $car2docStorage,
                    "vehicle_id" => $vehicles->id
                ]);
            }
        }


        DB::Commit();

        if(Auth::user()->company->count() == 0){
            return redirect()->route('guest.indxe');
        }else{
            return redirect()->route('companies.index');
        }
        //return [$delivery, $vehicles];
    }

    public function getMarcas( $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'marcas' => Marca::where('kind_vehicle_id', $request->kind)->get()

        ]);
    }

    public function getModelos( $request)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'modelos' => Modelo::where('marca_id', $request->marca)->get()

        ]);
    }
}


  /*if (isset($request->images)) {
            $deliveryImage = $request->images;
            $deliveryname = $deliveryImage->getClientOriginalName();
            $deliveryExt = $deliveryImage->getClientOriginalExtension();
            $deliveryStorage = $deliveryname . time() . "." . $deliveryExt;
            $deliveryImage->move(public_path('nitade/delivery/image'), $deliveryStorage);
            $deliveryimgStorage = '/nitade/delivery/image' . $deliveryStorage;
        }



        if (isset($request->cartaConducao)) {
            $carta = $request->cartaConducao;
            $cartaname = $carta->getClientOriginalName();
            $cartaExt = $carta->getClientOriginalExtension();
            $cartaStorage = $cartaname . time() . "." . $cartaExt;
            $carta->move(public_path('nitade/delivery/Document'), $cartaStorage);
            $cartadocStorage = '/nitade/delivery/Document' . $cartaStorage;
        }

        if (isset($request->bi)) {
            $bi = $request->bi;
            $biname = $bi->getClientOriginalName();
            $biExt = $bi->getClientOriginalExtension();
            $biStorage = $biname . time() . "." . $biExt;
            $bi->move(public_path('nitade/delivery/Document'), $biStorage);
            $bidocStorage = '/nitade/delivery/Document' . $biStorage;
        }

        if (isset($request->registroCriminal)) {
            $rc = $request->registroCriminal;
            $rcname = $rc->getClientOriginalName();
            $rcExt = $rc->getClientOriginalExtension();
            $rcStorage = $rcname . time() . "." . $rcExt;
            $rc->move(public_path('nitade/delivery/Document'), $rcStorage);
            $rcdocStorage = '/nitade/delivery/Document' . $rcStorage;
        }

        if (isset($request->carImage1)) {
            $car1 = $request->carImage1;
            $car1name = $car1->getClientOriginalName();
            $car1Ext = $rc->getClientOriginalExtension();
            $car1Storage = $car1name . time() . "." . $car1Ext;
            $car1->move(public_path('nitade/delivery/carImage/main'), $car1Storage);
            $car1docStorage = '/nitade/delivery/carImage/main' . $car1Storage;
        }*/

                /*$car2name = $car2->getClientOriginalName();
                $car2Ext = $rc->getClientOriginalExtension();
                $car2Storage = $car2name . time() . "." . $car2Ext;
                $car2->move(public_path('nitade/delivery/carImage/other'), $car2Storage);
                $car2docStorage = '/nitade/delivery/carImage/other' . $car2Storage;*/
