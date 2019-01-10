<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getList(){
        $data = Session::get('cart');
        if($data!=0)
        {
            $totalQty = 0;
            $totalPrice = 0;
            foreach ($data as $value)
            {
                $totalQty += $value["quantity"];
                $total = ((int)$value["quantity"] *  (int)$value["product_price"]);
                $totalPrice +=  $total;
            }
            $json = [
                "status" => "success",
                "mesage" =>"lấy danh sách thành công",
                "data" =>$data,
                "totalQty" => $totalQty,
                "totalPrice" =>$totalPrice
            ];
        }
        else{
            $json = [
                "status" => "error",
                "mesage" =>"không có sản phẩm nào trong giỏ hàng",
                "data" =>null,
                "totalQty" => 0,
                "totalPrice" =>0
            ];
        }
        return response()->json($json);
    }
    public function getPurchase(Request $request , $id){
        $cart = Session::get('cart');
        $check=false;
        if($cart!=0)
        {
            for ($i=0;$i<count($cart);$i++)
            {
                if($cart[$i]["id"]==$id)
                {
                    $check=true;
                    $cart[$i]["quantity"]+=1;
                    break;
                }
            }
            if($check)
            {
                Session::forget('cart');
                for ($i=0;$i<count($cart);$i++)
                {
                    Session::push('cart', $cart[$i]);
                }
            }
            else{
                $arr=array(
                    'id'=>$id,
                    'product_title'=>$request->product_title,
                    'product_price'=>$request->product_price,
                    'product_avatar'=>$request->product_avatar,
                    'product_content'=>$request->product_content,
                    'quantity'=>1
                );
                Session::push('cart', $arr);
            }

        }
        else{
            $arr=array(
                'id'=>$id,
                'product_title'=>$request->product_title,
                'product_price'=>$request->product_price,
                'product_avatar'=>$request->product_avatar,
                'product_content'=>$request->product_content,
                'quantity'=>1
            );
            Session::push('cart', $arr);
        }
        $data = Session::get('cart');
        $totalQty = 0;
        $totalPrice = 0;
        foreach ($data as $value)
        {
            $totalQty += $value["quantity"];
            $total = ((int)$value["quantity"] *  (int)$value["product_price"]);
            $totalPrice +=  $total;
        }
        $json = [
            "status" => "success",
            "mesage" =>"Thêm sản phẩm vào giỏ hàng thành công",
            "data" =>$data,
            "totalQty" => $totalQty,
            "totalPrice" =>$totalPrice
        ];
        return response()->json($json);

    }
    public function updateproduct_price(Request $request , $id){
        $cart = Session::get('cart');
        $check=false;
        if($cart!=0)
        {
            for ($i=0;$i<count($cart);$i++)
            {
                if($cart[$i]["id"]==$id)
                {
                    $check=true;
                    $cart[$i]["product_price"]=$request->product_price;
                    break;
                }
            }
            if($check)
            {
                Session::forget('cart');
                for ($i=0;$i<count($cart);$i++)
                {
                    Session::push('cart', $cart[$i]);
                }
            }
        }
        $result = ["status" => "success","Cập nhật giá sản phẩm thành công"];
        $json = \GuzzleHttp\json_decode($result, true);
        return response()->json($json);
    }
    public function delete_purchase(Request $request,$id){
        $cart = session()->pull('cart', []);
        for ($i=0;$i<count($cart);$i++) {
            if ($cart[$i]["id"] == $id) {
                unset($cart[$i]);
                break;
            }
        }
        session()->put('cart', $cart);
        $result = ["status" => "success","Đã xóa một sản phẩm khỏi giỏ hàng"];
        $json = \GuzzleHttp\json_decode($result, true);
        return response()->json($json);
    }
    public function removeall(Request $request)
    {
        Session::forget('cart');
        $result = ["status" => "success","Giỏ hàng đã được xóa"];
        $json = \GuzzleHttp\json_decode($result, true);
        return response()->json($json);
    }

}
