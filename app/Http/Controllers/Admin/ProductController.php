<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware(['auth']);
    }
    public function getList()
    {
        if(Auth::user()->can('admin')) {
            $product = $this->product->all();
            if ($product == true) {
                return view('admin.product.list',
                    ["product" => $product,
                    ]);
            } else {
                $message = $this->product->errors() ?: $this->product->errorQuery();
                Session::flash('error', $message);
                $product = [];
                return view('admin.product.list',
                    ["product" => $product]);
            }
        }
        abort(401);
    }

    public function getFind($id)
    {
        $product=  $this->product->find($id);
        if($product== true)
        {
            Session::flash('message', 'find success');
            return view('admin.product.find',
                ["product" => $product]);
        }
        else
        {
            $message = $this->product->errors()?:$this->product->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/product/');
        }

    }
    public function getCreate()
    {
        return view('admin.product.create');
    }

    public function postCreate(Request $request)
    {
        $data = [
            'product_title'=>$request->title,
            'product_price'=>$request->price,
            'product_price_sales'=>$request->price_sales,
            'product_content'=>$request->product_contents,
            'product_keyword' => $request->keyword,
            'product_avatar' => $request->avatar,
            'product_categories' => $request->product_categories,
        ];
        $product=  $this->product->create($data);
        if($product== true)
        {
            Session::flash('message', 'Create new products success');
            return redirect('admin/product/');
        }
        else
        {
            $messageQuery = $this->product->errorQuery();
            $message = $this->product->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('errors', $message);
            return view('admin.product.create');
        }
    }

    public function getUpdate($id)
    {
        $product_destail=  $this->product->find($id);
        return view('admin.product.update',['product_destail'=>$product_destail]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'id' => $id,
            'product_title'=>$request->title,
            'product_price'=>$request->price,
            'product_price_sales'=>$request->price_sales,
            'product_content'=>$request->product_contents,
            'product_keyword' => $request->keyword,
            'product_avatar' => $request->avatar,
            'product_categories' => $request->product_categories,
        ];
        $product=  $this->product->update($data);
        if($product== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/product/');
        }
        else
        {
            $message = $this->product->errors()?:$this->product->errorQuery();
            Session::flash('error', $message);
            return redirect()->back();
        }
    }

    public function getAllTrash()
    {
        $product_trash=  $this->product->allTrash();
        return view('admin.product.trash',['product_trash'=>$product_trash]);
    }

    public function getRecover($id)
    {
        $product=  $this->product->trash($id,false);
        return redirect('admin/product/all-trash');
    }
    public function getTrash($id)
    {
        $product=  $this->product->trash($id);
        return redirect('admin/product/');
    }

    public function getDelete($id)
    {
        $product=  $this->product->delete($id);
        return redirect('admin/product/all-trash');
    }
}
