<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\NewsCategories;
use Entity\News\NewsEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{

    public function __construct(NewsEntity $news)
    {
        $this->news = $news;
    }
    public function getList()
    {
        $news=  $this->news->all();
        if($news== true)
        {
            return view('admin.news.list',
                ["news" => $news]);
        }
        else
        {
            $message = $this->news->errors()?:$this->news->errorQuery();
            Session::flash('error', $message);
            $news = [];
            return view('admin.news.list',
                ["news" => $news]);
        }

    }

    public function getFind($id)
    {
        $news=  $this->news->find($id);
        if($news== true)
        {
            Session::flash('message', 'find success');
            return view('admin.news.find',
                ["news" => $news]);
        }
        else
        {
            $message = $this->news->errors()?:$this->news->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/news/');
        }

    }
    public function getCreate()
    {
        $categories = NewsCategories::take(10)
            ->get();
        return view('admin.news.create',["categories"=>$categories]);
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
        $news=  $this->news->create($data);
        if($news== true)
        {
            Session::flash('message', 'Create new categoriess success');
            return redirect('admin/news/');
        }
        else
        {
            $messageQuery = $this->news->errorQuery();
            $message = $this->news->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return redirect( url()->previous());
        }
    }

    public function getUpdate($id)
    {
        $news_detail=  $this->news->find($id);
        $categories = NewsCategories::take(10)->get();
        return view('admin.news.update',[
            'news_detail'=>$news_detail,
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
        $news=  $this->news->update($data);
        if($news== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/news/');
        }
        else
        {
            $messageQuery = $this->news->errorQuery();
            $message = $this->news->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            dd($message);
            return redirect( url()->previous());
        }
    }

    public function getAllTrash()
    {
        $news_trash=  $this->news->allTrash();
        return view('admin.news.trash',['news_trash'=>$news_trash]);
    }

    public function getRecover($id)
    {
        $news=  $this->news->trash($id,false);
        return redirect('admin/news/all-trash');
    }
    public function getTrash($id)
    {
        $news=  $this->news->trash($id);
        return redirect('admin/news/');
    }

    public function getDelete($id)
    {
        $news=  $this->news->delete($id);
        return redirect('admin/news/all-trash');
    }
}
