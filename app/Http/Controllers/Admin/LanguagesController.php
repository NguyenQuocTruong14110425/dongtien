<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Languages;
use Entity\Languages\LanguagesEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguagesController extends Controller
{

    public function __construct(LanguagesEntity $languages)
    {
        $this->languages = $languages;
    }
    public function getList()
    {
        $languages=  $this->languages->all();
        if($languages== true)
        {
            return view('admin.languages.list',
                ["languages" => $languages]);
        }
        else
        {
            $message = $this->languages->errors()?:$this->languages->errorQuery();
            Session::flash('error', $message);
            $languages = [];
            return view('admin.languages.list',
                ["languages" => $languages]);
        }

    }

    public function getFind($id)
    {
        $languages=  $this->languages->find($id);
        if($languages== true)
        {
            Session::flash('message', 'find success');
            return view('admin.languages.find',
                ["languages" => $languages]);
        }
        else
        {
            $message = $this->languages->errors()?:$this->languages->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/languages/');
        }

    }
    public function getCreate()
    {
        $categories = Languages::take(10)
            ->get();
        return view('admin.languages.create',["categories"=>$categories]);
    }

    public function postCreate(Request $request)
    {
        $data = [
            'lang_code'=>$request->lang_code,
            'lang_description'=>$request->description,
        ];
        $languages=  $this->languages->create($data);
        if($languages== true)
        {
            Session::flash('message', 'Create new categoriess success');
            return redirect('admin/languages/');
        }
        else
        {
            $messageQuery = $this->languages->errorQuery();
            $message = $this->languages->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return redirect( url()->previous());
        }
    }

    public function getUpdate($id)
    {
        $languages_detail=  $this->languages->find($id);
        $categories = Languages::take(10)->get();
        return view('admin.languages.update',[
            'languages_detail'=>$languages_detail,
            'categories'=>$categories,
        ]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'id' => $id,
            'languages_title'=>$request->title,
            'languages_description'=>$request->description,
            'languages_content' => $request->contents,
            'languages_keyword' => $request->keword,
            'languages_tag' => $request->tags,
            'languages_slug' => $request->slug,
            'languages_avatar' => $request->avatar,
            'languages_categories_id' => $request->categories,
            'languages_publish' => $request->publish,
            'languages_status' => $request->status,
            'languages_link1' => $request->link3,
            'languages_link2' => $request->link2,
            'languages_link3' => $request->link3,
            'languages_lang_code' => $request->lang_code,
        ];
        $languages=  $this->languages->update($data);
        if($languages== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/languages/');
        }
        else
        {
            $messageQuery = $this->languages->errorQuery();
            $message = $this->languages->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            dd($message);
            return redirect( url()->previous());
        }
    }

    public function getAllTrash()
    {
        $languages_trash=  $this->languages->allTrash();
        return view('admin.languages.trash',['languages_trash'=>$languages_trash]);
    }

    public function getRecover($id)
    {
        $languages=  $this->languages->trash($id,false);
        return redirect('admin/languages/all-trash');
    }
    public function getTrash($id)
    {
        $languages=  $this->languages->trash($id);
        return redirect('admin/languages/');
    }

    public function getDelete($id)
    {
        $languages=  $this->languages->delete($id);
        return redirect('admin/languages/all-trash');
    }
}
