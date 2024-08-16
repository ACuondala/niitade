<?php

namespace App\Http\Controllers;

use App\services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $service)
    {
        $this->productService=$service;
    }
    //
    public function store(Request $request, $nome)
    {
        return $this->productService->createProduct($request);
    }


    public function productDetail($id){
        return $this->productService->detail($id);

    }

    public function destroy($id){
        return $this->productService->deleteProduct($id);
    }
}
