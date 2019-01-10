<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Entity\Product\ProductEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct(ProductEntity $product)
    {
        $this->product = $product;
    }
    public function getList()
    {
        $products = $this->product->all();
            $json = \GuzzleHttp\json_decode($products, true);
            return response()->json($json);
    }

    public function getFind($id)
    {
        $products=  $this->product->find($id);
        return response()->json($products);
    }
}
