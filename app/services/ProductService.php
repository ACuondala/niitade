<?php


namespace App\services;

use App\Models\Company;
use App\Models\ProductImage;
use App\Models\Products;
use App\traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductService{
    use UploadFiles;


    public function createProduct(Request $request){



        $product=$this->uploadFile($request, $request->fotoCapa, "/nitade/product");
        $company=Company::where('status','active')->where('user_id',Auth::user()->id)->first();
        DB::beginTransaction();
            $products=Products::create([
                "name"=>$request->nome,
                "images"=>$product,
                "status"=>$request->status,
                "price"=>$request->preco,
                "subprice"=>$request->subPreco,
                "quatity"=>$request->quantidade,
                "reference"=>$request->referencia,
                "bonus"=>$request->bonus,
                "description"=>$request->descricao,
                "company_id"=>$company->id,
                'kind_product_id'=>$request->tipo_produto_id,
                'delivery_mode_id'=>$request->tipo_entrega_id
            ]);

            if(isset($request->images)){
                $productImages=$request->images;
                foreach($productImages as $images){
                    /*$imageName=$images->getClientOriginalName();
                    $imgExt=$images->getClientOriginalExtension();
                    $productStorage=$imageName.time().".".$imgExt;
                    $images->move(public_path('/nitade/product/other/'),$productStorage);
                    $produtcOther='/nitade/product/other/'.$productStorage;*/
                    $productOther=$this->uploadFile($request, $images, "/nitade/product/other");
                    $img=new ProductImage();

                    $img->product_id=$products->id;
                    $img->productImage=$productOther;
                    $img->save();

                }
            }

        DB::commit();
        return redirect()->route('companies.profile',$company->companyName);
    }

    public function detail($id){
        $productDetaisl=Products::with('company')->where('id',$id)->first();
        return view('company.products.productDetail',['productDetail'=>$productDetaisl]);
    }

    public function deleteProduct($id){
        $product=Products::find($id);
        if(!$product){
            return redirect()->back();
        }
        return redirect()->back();
    }
}
