<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\NewsCategories;
use Entity\Users\UsersEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function __construct(UsersEntity $users)
    {
        $this->users = $users;
        $this->middleware('auth');
    }
    public function getList()
    {
            if(Auth::user()->can('client'))
        {
            $users=  $this->users->all();
            if($users== true)
            {
                return view('admin.users.list',
                ["users" => $users]);
            }
            else
            {
                $message = $this->users->errors()?:$this->users->errorQuery();
                Session::flash('error', $message);
                $users = [];
                return view('admin.users.list',
                    ["users" => $users]);
            }
        }
        abort(401);
    }

    public function getFind($id)
    {
        $users=  $this->users->find($id);
        if($users== true)
        {
            Session::flash('message', 'find success');
            return view('admin.users.find',
                ["users" => $users]);
        }
        else
        {
            $message = $this->users->errors()?:$this->users->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/Users/');
        }

    }
    public function getCreate()
    {
        $categories = NewsCategories::take(10)
            ->get();
        return view('admin.users.create',["categories"=>$categories]);
    }

    public function postCreate(Request $request)
    {
        $data = [
            'news_title'=>$request->title,
            'news_description'=>$request->description,
            'news_content' => $request->contents,
            'news_keyword' => $request->keword,
            'news_tag' => $request->tags,
            'news_slug' => $request->slug,
            'news_avatar' => $request->avatar,
            'news_categories_id' => $request->categories,
            'news_publish' => $request->publish,
            'news_status' => $request->status,
            'news_link1' => $request->link3,
            'news_link2' => $request->link2,
            'news_link3' => $request->link3,
            'news_lang_code' => $request->lang_code,
        ];
        $users=  $this->users->create($data);
        if($users== true)
        {
            Session::flash('message', 'Create new categoriess success');
            return redirect('admin/Users/');
        }
        else
        {
            $messageQuery = $this->users->errorQuery();
            $message = $this->users->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return redirect( url()->previous());
        }
    }

    public function getUpdate($id)
    {
        $users_detail=  $this->users->find($id);
        $categories = NewsCategories::take(10)->get();
        return view('admin.users.update',[
            'users_detail'=>$users_detail,
            'categories'=>$categories,
        ]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'id' => $id,
            'news_title'=>$request->title,
            'news_description'=>$request->description,
            'news_content' => $request->contents,
            'news_keyword' => $request->keword,
            'news_tag' => $request->tags,
            'news_slug' => $request->slug,
            'news_avatar' => $request->avatar,
            'news_categories_id' => $request->categories,
            'news_publish' => $request->publish,
            'news_status' => $request->status,
            'news_link1' => $request->link3,
            'news_link2' => $request->link2,
            'news_link3' => $request->link3,
            'news_lang_code' => $request->lang_code,
        ];
        $users=  $this->users->update($data);
        if($users== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/Users/');
        }
        else
        {
            $messageQuery = $this->users->errorQuery();
            $message = $this->users->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            dd($message);
            return redirect( url()->previous());
        }
    }

    public function getAllTrash()
    {
        $news_trash=  $this->users->allTrash();
        return view('admin.users.trash',['news_trash'=>$news_trash]);
    }

    public function getRecover($id)
    {
        $users=  $this->users->trash($id,false);
        return redirect('admin/Users/all-trash');
    }
    public function getTrash($id)
    {
        $users=  $this->users->trash($id);
        return redirect('admin/Users/');
    }

    public function getDelete($id)
    {
        $users=  $this->users->delete($id);
        return redirect('admin/Users/all-trash');
    }
}
