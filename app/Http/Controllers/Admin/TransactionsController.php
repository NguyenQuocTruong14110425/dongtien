<?php

namespace App\Http\Controllers\Admin;

use Entity\Transactions\TransactionsEntity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
class TransactionsController extends Controller
{
    public function __construct(transactionsEntity $transactions)
    {
        $this->transactions = $transactions;
    }
    public function getList()
    {
        return view('admin.transactions.list');

    }

    public function getFind($id)
    {
        $transactions=  $this->transactions->find($id);
        if($transactions== true)
        {
            Session::flash('message', 'find success');
            return view('admin.transactions.find',
                ["transactions" => $transactions]);
        }
        else
        {
            $message = $this->transactions->errors()?:$this->transactions->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/transactions/');
        }

    }
    public function getCreate()
    {
        $categories = transactionsCategories::take(10)
            ->get();
        return view('admin.transactions.create',["categories"=>$categories]);
    }

    public function postCreate(Request $request)
    {
        $data = [
            'transactions_title'=>$request->title,
            'transactions_description'=>$request->description,
            'transactions_content' => $request->contents,
            'transactions_keyword' => $request->keword,
            'transactions_tag' => $request->tags,
            'transactions_slug' => $request->slug,
            'transactions_avatar' => $request->avatar,
            'transactions_categories_id' => $request->categories,
            'transactions_publish' => $request->publish,
            'transactions_status' => $request->status,
            'transactions_link1' => $request->link3,
            'transactions_link2' => $request->link2,
            'transactions_link3' => $request->link3,
            'transactions_lang_code' => $request->lang_code,
        ];
        $transactions=  $this->transactions->create($data);
        if($transactions== true)
        {
            Session::flash('message', 'Create new categoriess success');
            return redirect('admin/transactions/');
        }
        else
        {
            $messageQuery = $this->transactions->errorQuery();
            $message = $this->transactions->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return redirect( url()->previous());
        }
    }

    public function getUpdate($id)
    {
        $transactions_detail=  $this->transactions->find($id);
        $categories = transactionsCategories::take(10)->get();
        return view('admin.transactions.update',[
            'transactions_detail'=>$transactions_detail,
            'categories'=>$categories,
        ]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'id' => $id,
            'transactions_title'=>$request->title,
            'transactions_description'=>$request->description,
            'transactions_content' => $request->contents,
            'transactions_keyword' => $request->keword,
            'transactions_tag' => $request->tags,
            'transactions_slug' => $request->slug,
            'transactions_avatar' => $request->avatar,
            'transactions_categories_id' => $request->categories,
            'transactions_publish' => $request->publish,
            'transactions_status' => $request->status,
            'transactions_link1' => $request->link3,
            'transactions_link2' => $request->link2,
            'transactions_link3' => $request->link3,
            'transactions_lang_code' => $request->lang_code,
        ];
        $transactions=  $this->transactions->update($data);
        if($transactions== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/transactions/');
        }
        else
        {
            $messageQuery = $this->transactions->errorQuery();
            $message = $this->transactions->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return redirect( url()->previous());
        }
    }

    public function getAllTrash()
    {
        $transactions_trash=  $this->transactions->allTrash();
        return view('admin.transactions.trash',['transactions_trash'=>$transactions_trash]);
    }

    public function getRecover($id)
    {
        $transactions=  $this->transactions->trash($id,false);
        return redirect('admin/transactions/all-trash');
    }
    public function getTrash($id)
    {
        $transactions=  $this->transactions->trash($id);
        return redirect('admin/transactions/');
    }

    public function getDelete($id)
    {
        $transactions=  $this->transactions->delete($id);
        return redirect('admin/transactions/all-trash');
    }
}
