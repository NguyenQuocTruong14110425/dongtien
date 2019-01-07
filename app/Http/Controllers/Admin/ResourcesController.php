<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Entity\Resources\ResourcesEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
class ResourcesController extends Controller
{
    public function __construct(ResourcesEntity $resources)
    {
        $this->resources = $resources;
    }
    public function getList()
    {
        $resources=  $this->resources->all();
        if($resources== true)
        {
            return view('admin.resources.list',
                ["resources" => $resources]);;
        }
        else
        {
            $message = $this->resources->errors()?:$this->resources->errorQuery();
            Session::flash('error', $message);
            $resources = [];
            return view('admin.resources.list',
                ["resources" => $resources]);
        }

    }

    public function getFind($id)
    {
        $resources=  $this->resources->find($id);
        if($resources== true)
        {
            Session::flash('message', 'find success');
            return view('admin.resources.find',
                ["resources" => $resources]);
        }
        else
        {
            $message = $this->resources->errors()?:$this->resources->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/resources/');
        }

    }
    public function getCreate()
    {
        return view('admin.resources.create');
    }

    public function postCreate(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $x1 = $request->x1;
            $y1 = $request->y1;
            $w = $request->w;
            $h = $request->h;
//            $pathSave = base_path('../public/upload/' . $request->type_resource);
//            $fileName = $request->type_resource . '_' . $file->getClientOriginalName();
//            $fileNameThumb = $file->getClientOriginalName();
//            $pathThumb = base_path('../public/upload/thumb/' . $fileNameThumb);
//            $fileThumb = Image::make($file);
//            $fileThumb->crop($w,$h,$x1,$y1);
//            $fileThumb->save($pathThumb);
//            $file->move($pathSave, $fileName);
            $data = [
            'resources_title'=>$request->title,
            'resources_description'=>$request->description,
            'resources_path' =>  null,
            'resources_thumb' => null,
            'files'=> $file,
            'x1' => $x1,
            "y1" => $y1,
            'w' => $w,
            'h' => $h,
            'resources_type' => $request->type_resource,
            'resources_lang_code' => $request->lang_code
            ];
            $resources =  $this->resources->create($data);
            if($resources== true)
            {
                Session::flash('message', 'Create new resourcess success');
                return redirect('admin/resources/');
            }
            else
            {
                $messageQuery = $this->resources->errorQuery();
                $message = $this->resources->errors();
                dd($messageQuery);
                Session::flash('messageQuery', $messageQuery);
                Session::flash('error', $message);
                return view('admin.resources.create');
            }
        }
        else
        {
            Session::flash('messageQuery', 'khong co file');
            return view('admin.resources.create');
        }

    }

    public function getUpdate($id)
    {
        $resources_destail=  $this->resources->find($id);
        return view('admin.resources.update',['resources_destail'=>$resources_destail]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'id' => $id,
            'resources_title'=>$request->title,
            'resources_description'=>$request->description,
            'resources_path' => null,
            'resources_thumb' => null,
            'resources_type' => $request->type_resource,
            'resources_lang_code' => $request->lang_code
        ];
        $resources=  $this->resources->update($data);
        if($resources== true)
        {
            Session::flash('message', 'Update categorie ssuccess');
            return redirect('admin/resources/');
        }
        else
        {
            $message = $this->resources->errors()?:$this->resources->errorQuery();
            Session::flash('error', $message);
            return view('admin.resources.update');
        }
    }

    public function getAllTrash()
    {
        $resources_trash=  $this->resources->allTrash();
        return view('admin.resources.trash',['resources_trash'=>$resources_trash]);
    }

    public function getRecover($id)
    {
        $resources=  $this->resources->trash($id,false);
        return redirect('admin/resources/all-trash');
    }
    public function getTrash($id)
    {
        $resources=  $this->resources->trash($id);
        return redirect('admin/resources/');
    }

    public function getDelete($id)
    {
        $resources=  $this->resources->delete($id);
        return redirect('admin/resources/all-trash');
    }
}
