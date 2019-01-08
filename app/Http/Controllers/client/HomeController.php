<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index()
    {
        $products =  DB::table('products')
            ->where('IsDelete','=','0')
            ->where('product_categories','=','Sản phẩm nguyên hộp')
            ->limit(5)
            ->get();
        return view('client.home.index3',["products" => $products]);
    }

    function Socola()
    {
        $products_01 =  DB::table('products')
            ->where('IsDelete','=','0')
            ->where('product_categories','=','Kẹo viên in hình')
            ->get();
        $products_02 =  DB::table('products')
            ->where('IsDelete','=','0')
            ->where('product_categories','=','Kẹo viên đen trắng')
            ->get();
        $products_03 =  DB::table('products')
            ->where('IsDelete','=','0')
            ->where('product_categories','=','Hoa Socola + hoa giả')
            ->get();
        $products_04 =  DB::table('products')
            ->where('IsDelete','=','0')
            ->where('product_categories','=','Khung ảnh socola')
            ->get();
        return view('client.home.socola',[
            "products_01" => $products_01,
            "products_02" => $products_02,
            "products_03" => $products_03,
            "products_04" => $products_04
        ]);
    }
}
